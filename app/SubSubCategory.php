<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
