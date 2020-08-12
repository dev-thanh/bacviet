<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FullTextSearch;

class Products extends Model
{
	use FullTextSearch;
	protected $table = 'products';

	protected $fillable = [ 
    	'name','name_en', 'slug' ,'content' ,'content_en', 'image' , 'more_image' , 'meta' ,'meta_en' , 'hot' , 'status' , 'meta_title' , 'meta_description' , 'meta_keyword','pr_code','price','size',
	];
    public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'category_product', 'id_product', 'id_category');
    }
    protected function fullTextWildcards($term)
	   {
	       // removing symbols used by MySQL
	       $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
	       $term = str_replace($reservedSymbols, '', $term);

	       $words = explode(' ', $term);

	       foreach ($words as $key => $word) {
	           /*
	            * applying + operator (required word) only big words
	            * because smaller ones are not indexed by mysql
	            */
	           if (strlen($word) >= 1) {
	               $words[$key] = '+' . $word  . '*';
	           }
	       }
	       
	       $searchTerm = implode(' ', $words);

	       return $searchTerm;
	   }

	   public function scopeFullTextSearch($query, $columns, $term)
	   {
	       $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($term));

	       return $query;
	   }
}
