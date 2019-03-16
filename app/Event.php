<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $fillable=['title','source','organized_by','organized_at','organization_place','description'];
}
