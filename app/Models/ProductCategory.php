<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'category_product';
    protected $fillable = [ 
    	'id_category', 'id_product'
	];
}
