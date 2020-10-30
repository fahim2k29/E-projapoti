<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class Category extends Model
{
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
