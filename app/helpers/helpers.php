<?php
use App\Event;
  if(!function_exists('file_upload')){
      function file_upload($file,$folder,$extensions){
        $extension='';
        $exploded=explode(',',$file);
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
  if(!function_exists('updateEventPremiumState')){
     function updateEventPremiumState(){
      $events=Event::all();
      $event_state=null;
      foreach($events as $event){
          $event->event_state=eventState((new DateTime($event->organized_at))->format('Y-m-d'));
          $event->save();
       }
     }
  }

  if(!function_exists('eventState')){
    function eventState($date){
      $now= (new DateTime())->format('Y-m-d');
      if($now<$date){
         return 2;
      }
      else if($now==$date){
           return 1;
      }
      else{
         return 0;
      }
  }
  }