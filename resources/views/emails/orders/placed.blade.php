@component('mail::message')
# Order Received

Thank you for your order.

**Order ID:** {{ $order->id }}

**Order Email:** {{ $order->billing_email }}

**Order Name:** {{ $order->billing_name }}

**Order Total:** R{{ round($order->billing_total) }}

**Items Ordered**

@foreach ($order->products as $product)
Name: {{ $product->name }} <br>
Price: R{{ round($product->price / 100, 2)}} <br>
Quantity: {{ $product->pivot->quantity }} <br>
@foreach($downloads as $download)
@component('mail::button', ['url' => env('APP_URL').'/downloads/'.$download->hash, 'color' => 'green'])
Download {{ $download->name }}
@endcomponent
@endforeach

@endforeach

You can get further details about your order by logging into our website.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}
@endcomponent
