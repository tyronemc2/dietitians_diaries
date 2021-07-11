<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $path = storage_path().'/app/public/';
        $mail = $this->to($this->order->billing_email, $this->order->billing_name)
                    ->bcc('jessica@dietitiansdiaries.com')
                    ->subject('Order from Dietitians Diaries')
                    ->markdown('emails.orders.placed');
                    foreach($this->order->products as $product){
                        if ($product->meal_plans) {
                            $files = json_decode($product->meal_plans);
                               $mail = $mail->attach($path.$files[0]->download_link, [
                                    'as' => $files[0]->original_name, 
                                    'mime' => 'application/pdf'
                                ]);
                        }
                        if ($product->workout_plans) {
                            $files = json_decode($product->workout_plans);

                                $mail = $mail->attach($path.$files[0]->download_link, [
                                    'as' => $files[0]->original_name, 
                                    'mime' => 'application/pdf'
                                ]);

                        }
                    }
                    return $mail;
    }
}
