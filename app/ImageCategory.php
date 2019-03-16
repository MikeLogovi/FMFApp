<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{   
    public $fillable=['name'];
    public function image()
    {
        return $this->belongsTo('App\Image');
    }
}
