<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customers()
    {
        return $this->belongsTo(Customer::class,'user_id','id');
    }

    public function billinginfo()
    {
        return $this->hasOne(BillingInfo::class,'order_id','id');
    }

    public function orderhistory()
    {
        return $this->hasOne(OrderHistory::class,'order_id','id');
    }



}
