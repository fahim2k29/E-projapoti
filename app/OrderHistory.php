<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    public function orderBill()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
