<?php

namespace App\Mail;

use App\Order;
use App\OrderDownloads;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $downloads;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        //
        $downs = OrderDownloads::where('order_id', $order->id)->get();
        $this->downloads = $downs;
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
                    
                    return $mail;
    }
}
