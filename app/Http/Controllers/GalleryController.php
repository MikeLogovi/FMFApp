<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageCategory;
class GalleryController extends Controller
{
    public function random(){
        return DB::table('images')->inRandomOrder()->paginate(10);
   }
   public function events($id){
        $category=ImageCategory::findOrFail($id);
        return DB::table('images')->where('category_id',$category->id)->inRandomOrder()->paginate(10);
   }
}
