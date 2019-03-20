<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $fillable=['name','source','description','category_id','category_name','link'];
    public function category(){
       
        return $this->belongsTo('App\VideoCategory', 'id');
    
     }
}
