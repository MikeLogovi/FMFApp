<?php
  if(!function_exists('file_upload')){
      function file_upload($request,$folder,$extensions){
        $extension='';
        $exploded=explode(',',$request->file);
        $decoded=base64_decode($exploded[1]);
       foreach($extensions as $ext){
           if(str_contains($exploded[0],$ext)){
             $extension=$ext;
             break;
           }
       }
        $filename=str_random().'.'.$extension;
        $path=public_path().$folder.$filename;
        file_put_contents($path,$decoded);
        return $filename;
    }
  }