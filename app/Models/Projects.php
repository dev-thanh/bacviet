<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
    protected $fillable = [ 
    	'name', 'slug' , 'sort_desc' , 'content' , 'image' , 'more_image' , 'meta' , 'hot' , 'status' , 'meta_title' , 'meta_description' , 'meta_keyword','pr_code','price','size','investor','address','acreage','time_project'
	];


	public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'project_category', 'id_project', 'id_category');
    }

}
