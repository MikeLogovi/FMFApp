<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $fillable=['name','source','description','category_id','category_name'];
    public function category(){
       
        return $this->hasOne('App\VideoCategory', 'id');
    
     }
}
