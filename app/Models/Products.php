<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	protected $table = 'products';

	protected $fillable = [ 
    	'name','name_en', 'slug' ,'content' ,'content_en', 'image' , 'more_image' , 'meta' ,'meta_en' , 'hot' , 'status' , 'meta_title' , 'meta_description' , 'meta_keyword','pr_code','price','size',
	];
    public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'category_product', 'id_product', 'id_category');
    }
}
