<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Events\EventEvent;
use App\Events\PastEvent;
use App\Events\TodayEvent;
use App\Events\UpcomingEvent;
use \DateTime as DateTime;
use Illuminate\Support\Facades\DB;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
       updateEventPremiumState();
       return Event::latest()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['title'=>'required|string|min:4|unique:events|max:191','organized_by'=>'required','organized_at'=>'required','organization_place'=>'required']);
        $filename=file_upload($request->file,'/events/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
        $event_state=eventState((new DateTime($request->organized_at))->format('Y-m-d'));
        
        $event=Event::create(['title'=>$request->title,'organized_at'=>$request->organized_at,'organized_by'=>$request->organized_by,'organization_place'=>$request->organization_place,'source'=>'/events/'.$filename,'description'=>$request->description,'event_state'=>$event_state]);
        //event(new EventEvent);
        $this->publishEvent($event_state);
        return $event;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event=Event::findOrFail($id);
        if(!empty($request->file)){
            unlink(public_path().$event->source);
            $filename=file_upload($request->file,'/events/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
           
            $event->source='/events/'.$filename;
        }
        if(!empty($request->title)){
            $this->validate($request,['title'=>'required|string|min:4|unique:events|max:191']);
            $event->title=$request->title;
        }
        if(!empty($request->organized_by)){
            $this->validate($request,['organized_by'=>'required']);
            $event->organized_by=$request->organized_by;
        }
        if(!empty($request->organized_at)){
            $this->validate($request,['organized_at'=>'required']);
            $event->organized_at=$request->organized_at;
            $event->event_state=eventState($event->organized_at);
            
        }
        if(!empty($request->organization_place)){
            $this->validate($request,['organization_place'=>'required']);
            $event->organization_place=$request->organization_place;
        }
        if(!empty($request->description)){
            $event->description=$request->description;
        }
        $event->save();
        //event(new EventEvent);
        $this->publishEvent($event->event_state);
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event=Event::findOrFail($id);
        unlink(public_path().$event->source);
        $state=$event->event_state;
        $event->delete();
        $this->publishEvent($state);
        // event(new EventEvent);
        return['message'=>'Event deleted'];
    }

    private function publishEvent($state){
         if($state==0){
             event(new PastEvent);
         }
         else if($state==1){
            event(new TodayEvent);
         }
         else{
            event(new UpcomingEvent);
         }
    }
    

    
}
