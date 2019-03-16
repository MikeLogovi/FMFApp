<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Image extends Model{
   public $fillable=['name','source','category_id','category_name'];
   public function category(){
      
       return $this->hasOne('App\ImageCategory', 'id');
   
    }
}