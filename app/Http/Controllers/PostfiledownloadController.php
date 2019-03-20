<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Post;
class PostfiledownloadController extends Controller
{
   public function download($id){
     $post=Post::FindOrFail($id);
     $file=$post->attached_file;
     $file=explode('.',$file);
     $extension=$file[count($file)-1];
     $path=public_path().$post->attached_file;
     $headers=array(
         'Content-Type'=>'application/'.$extension
     );
     return response()->download($path,$post->title.'.'.$extension,$headers);

   }
}
