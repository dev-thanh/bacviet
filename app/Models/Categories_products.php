<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories_products extends Model
{
    protected $table = 'categorys_products';

    public function products(){
    	return $this->hasMany('App\Models\Products','id_category');
    }
}
