<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDownloads extends Model
{
    protected $table = 'order_downloads';

    protected $fillable = ['order_id', 'product_id', 'hash', 'downloaded_date', 'expiry_date','file','name'];
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
