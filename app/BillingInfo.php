<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingInfo extends Model
{
    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
