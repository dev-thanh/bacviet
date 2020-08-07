<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   	protected $table = 'menu_items';
    public function get_child_cate()
    {
    	return $this->where('parent_id', $this->id)->orderBy('position')->get();
    }
    public function cate_product($id){
        $pro = $this->where('parent_id',$id)->get();
        return $pro;
    }
    // public function cate_child($data){
    // 	foreach ($data as $val) {
    //         $id = $val["id"];
    //         $ten= $val["name"];
    //         if($data->parent_id==null){                
    //             echo '<li><a href="index.php" title="">'.$data->title;
    //         }
    //         if ($val['parent_id'] == $parent_id) {
    //             echo '<ul><li><a href="index.php" title="">Trang chủ</a> </li>';       
    //         }     
    //         if($data->parent_id==null){                
    //             echo '</a> </li>';
    //         }
    //         MenuMulti($data,$id);

    //     }
    // }
}
