<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=[

        'product_quantity'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id');
    }

}
