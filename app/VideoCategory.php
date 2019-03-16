<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    public $fillable=['name'];
    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
