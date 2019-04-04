<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\ImageCategory;
use Illuminate\Support\Facades\DB;
class PortfolioController extends Controller
{
    public function random(){
         return DB::table('images')->inRandomOrder()->limit(6)->get();
    }
    public function events($id){
         $category=ImageCategory::findOrFail($id);
         return DB::table('images')->where('category_id',$category->id)->orderBy('id','desc')->limit(6)->get();
    }
}
