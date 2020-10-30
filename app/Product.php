<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function pro_brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function pro_category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function pro_subCategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

    public function pro_subSubCategory()
    {
        return $this->belongsTo(SubSubCategory::class,'subsubcategory_id','id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'product_id');
    }


}
