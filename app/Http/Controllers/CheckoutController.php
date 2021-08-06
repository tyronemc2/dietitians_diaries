<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderProduct;
use App\OrderDownloads;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        return view('checkout')->with([
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }

        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try {
            //
            //
            $order = $this->addToOrdersTables($request, null);
            //
            //encryption key set in the Merchant Access Portal
            $encryptionKey = ENV('PAYGATE_ENCRYPTION'); //'secret';

            //$DateTime = new DateTime();

            $total = getNumbers()->get('newTotal');
            $data = array(
                'PAYGATE_ID'        => ENV('PAYGATE_ID'), //10011072130,
                'REFERENCE'         => 'dd_'.$order->id,
                'AMOUNT'            => $total,
                'CURRENCY'          => 'ZAR',
                'RETURN_URL'        => ENV('PAYGATE_RETURN_URL'),
                'TRANSACTION_DATE'  => date('Y-m-d H:i:s'),
                'LOCALE'            => 'en-za',
                'COUNTRY'           => 'ZAF',
                'EMAIL'             => 'payment@dietitiansdiaries.com',
            );

            $checksum = md5(implode('', $data) . $encryptionKey);

            $data['CHECKSUM'] = $checksum;
            //
            //
            $the_order = Order::find($order->id);
            $the_order->checksum = $checksum;
            $the_order->save();

            $fieldsString = http_build_query($data);

            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, 'https://secure.paygate.co.za/payweb3/initiate.trans');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_NOBODY, false);
            curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsString);

            //execute post
            $result = curl_exec($ch);
            parse_str($result, $output);
        //echo "<pre>";
        //print_r($output);
        //echo "</pre>";
        //exit();       
            //close connection
            curl_close($ch);
            //
            //
            if($output['PAYGATE_ID'] != ENV('PAYGATE_ID')){
                $the_order->error = 'PAYGATE_ID Invalid';
                $the_order->save();
                return back()->withErrors('Error! Something went wrong with the payment PAYGATE_ID Invalid');
            }
            if($output['REFERENCE'] != 'dd_'.$the_order->id){
                $the_order->error = 'ORDER_ID Invalid';
                $the_order->save();
                return back()->withErrors('Error! Something went wrong with the payment ORDER_ID Invalid');
            }
            
                $the_order->pay_request_id = $output['PAY_REQUEST_ID'];
                $the_order->save();
            //

            $this->decreaseQuantities();

            Cart::instance('default')->destroy();
            session()->forget('coupon');
            
            $paydata = array(
                'PAYGATE_ID'        => ENV('PAYGATE_ID'), //10011072130,
                'PAY_REQUEST_ID'    => $output['PAY_REQUEST_ID'],
                'REFERENCE'         => 'dd_'.$the_order->id,
                
            );

            $checksum = md5(implode('', $paydata) . $encryptionKey);
 
  
 //         $the_order->pay_request_id = $the_order->id.'Test';
 //           $the_order->save();
            // For Testing 
 //           $request = (object)[
 //               'PAY_REQUEST_ID' => $the_order->id.'Test',
 //               'TRANSACTION_STATUS' => 1,
 //             ];
            
 //           return $this->test_success($request);
            
            return view('payment')->with([
                'order' => $the_order,
                'PAY_REQUEST_ID' => $output['PAY_REQUEST_ID'],
                'CHECKSUM' => $checksum,
                'discount' => getNumbers()->get('discount'),
                'newSubtotal' => getNumbers()->get('newSubtotal'),
                'newTax' => getNumbers()->get('newTax'),
                'newTotal' => getNumbers()->get('newTotal'),
            ]);
             
            
        //    

            } catch (CardErrorException $e) {
                $this->addToOrdersTables($request, $e->getMessage());
                return back()->withErrors('Error! ' . $e->getMessage());
            }
    }
    public function success(Request $request)
    {
        //
        //
        $statuses = array(
            0 => 'Not Done',
            1 => 'Approved',
            2 => 'Declined',
            3 => 'Cancelled',
            4 => 'User Cancelled',
            5 => 'Received by PayGate',
            7 => 'Settlement Voided'
        );
        $order_id = $request->PAY_REQUEST_ID;
        $order = Order::where('pay_request_id', $order_id)->first();
        //
        if($order){
            //
            //
            if($request->TRANSACTION_STATUS == 1){
                foreach($order->products as $product){
                    if ($product->meal_plans) {
                        //
                        $x = 0;
                        while ($x < $product->pivot->quantity){
                            $files = json_decode($product->meal_plans);

                            $downloads = new OrderDownloads();
                            $downloads->order_id = $order->id;
                            $downloads->product_id = $product->id;
                            $downloads->file = $files[0]->download_link;
                            $downloads->name = $product->name.' Meal Plans';
                            $downloads->hash = str_replace ('/', '', Hash::make($files[0]->download_link));
                            $downloads->expiry_date = date('Y-m-d',strtotime('+14 days'));
                            $downloads->save();

                            $x++;
                        }

                    }
                    if ($product->workout_plans) {
                        //
                        $x = 0;
                        while ($x < $product->pivot->quantity){
                            $files = json_decode($product->workout_plans);

                            $downloads = new OrderDownloads();
                            $downloads->order_id = $order->id;
                            $downloads->product_id = $product->id;
                            $downloads->file = $files[0]->download_link;
                            $downloads->name = $product->name.' Workout Plans';
                            $downloads->hash = str_replace ('/', '', Hash::make($files[0]->download_link));
                            $downloads->expiry_date = date('Y-m-d',strtotime('+14 days'));
                            $downloads->save();

                            $x++;
                        }

                    }
                }
                Mail::send(new OrderPlaced($order));
            }
            //
            $order->status = $request->TRANSACTION_STATUS;
            $order->paygate_status = $statuses[$request->TRANSACTION_STATUS];
            $order->save();
            //
            if($order->paygate_status == 1){
                return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
            }else{
                return redirect()->route('confirmation.index')->with('error_message', 'Your payment was not accepted!');
            }
        }else{
            return redirect()->route('confirmation.index')->with('error_message', 'Your payment was not accepted!');
        }
    }
    public function test_success($request)
    {
        //
        //
        //echo $request->TRANSACTION_STATUS;
        $statuses = array(
            0 => 'Not Done',
            1 => 'Approved',
            2 => 'Declined',
            3 => 'Cancelled',
            4 => 'User Cancelled',
            5 => 'Received by PayGate',
            7 => 'Settlement Voided'
        );
        $order_id = $request->PAY_REQUEST_ID;
        $order = Order::where('pay_request_id', $order_id)->first();
        //
        if($order){
            //
            //
            if($request->TRANSACTION_STATUS == 1){
                 foreach($order->products as $product){
                
                    if ($product->meal_plans) {
                        //
                        $x = 0;
                        while ($x < $product->pivot->quantity){
                            $files = json_decode($product->meal_plans);

                            $downloads = new OrderDownloads();
                            $downloads->order_id = $order->id;
                            $downloads->product_id = $product->id;
                            $downloads->file = $files[0]->download_link;
                            $downloads->name = $product->name.' Meal Plans';
                            $downloads->hash = Hash::make($files[0]->download_link);
                            $downloads->expiry_date = date('Y-m-d',strtotime('+14 days'));
                            $downloads->save();

                            $x++;
                        }

                    }
                    if ($product->workout_plans) {
                        //
                        $x = 0;
                        while ($x < $product->pivot->quantity){
                            $files = json_decode($product->workout_plans);

                            $downloads = new OrderDownloads();
                            $downloads->order_id = $order->id;
                            $downloads->product_id = $product->id;
                            $downloads->file = $files[0]->download_link;
                            $downloads->name = $product->name.' Workout Plans';
                            $downloads->hash = Hash::make($files[0]->download_link);
                            $downloads->expiry_date = date('Y-m-d',strtotime('+14 days'));
                            $downloads->save();

                            $x++;
                        }

                    }
                }
       //         dd($order); exit();
                Mail::send(new OrderPlaced($order));
            }
            //
            $order->status = $request->TRANSACTION_STATUS;
            $order->paygate_status = $statuses[$request->TRANSACTION_STATUS];
            $order->save();
            //
            if($order->paygate_status == 1){
                return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
            }else{
                return redirect()->route('confirmation.index')->with('error_message', 'Your payment was not accepted!');
            }
        }else{
            return redirect()->route('confirmation.index')->with('error_message', 'Your payment was not accepted!');
        }
    }

    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'payment_gateway' => 'paygate',
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal')/100,
            'billing_tax' => getNumbers()->get('newTax')/100,
            'billing_total' => getNumbers()->get('newTotal')/100,
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }
}
