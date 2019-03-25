<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable=['title','description','author','written_at','attached_link','attached_image','attached_file'];
}
