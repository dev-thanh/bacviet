<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
    protected $fillable = [ 
    	'name','name_en', 'slug' , 'sort_desc' , 'content' ,'content_en' , 'image' , 'more_image' , 'meta' ,'meta_en' , 'hot' , 'status' , 'meta_title' , 'meta_description' , 'meta_keyword','pr_code','price','size','investor','address','acreage','time_project'
	];


	public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'project_category', 'id_project', 'id_category');
    }

}
