<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use App\Events\AboutEvent;
use Illuminate\Support\Facades\DB;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
  
    public function index()
    {   
        return ['paginate'=>About::latest()->paginate(10),'count'=>About::all()->count()];
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
        $this->validate($request,['title'=>'required|unique:abouts','circle_title'=>'required|unique:abouts','history'=>'required']);
        if(!empty($request->file)){
            $filename=file_upload($request->file,'/about/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
            $about= About::create(['title'=>$request->title,'circle_title'=>$request->circle_title,'period'=>$request->period,'source'=>'/about/'.$filename,'history'=>$request->history]);
        }
        else{
            $about= About::create(['title'=>$request->title,'circle_title'=>$request->circle_title,'period'=>$request->period,'history'=>$request->history]);
        }
        event(new AboutEvent);
        return $about;
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
        $about=About::FindOrFail($id);
        if(!empty($request->file)){
            if(file_exists(public_path().$about->source)){
                unlink(public_path().$about->source);
           }
            $filename=file_upload($request->file,'/about/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
            $about->source='/about/'.$filename;
        }
        if(!empty($request->title)){
            $this->validate($request,['title'=>'unique:abouts']);
            $about->title=$request->title;
        }
        if(!empty($request->circle_title)){
            $this->validate($request,['circle_title'=>'unique:abouts']);
            $about->circle_title=$request->circle_title;
        }
        if(!empty($request->period)){
            $about->period=$request->period;
        }
        if(!empty($request->history)){
            $about->history=$request->history;
        }
        $about->save();
        event(new AboutEvent);
        return $about;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=About::FindOrFail($id);
        if($about->source){
            if(file_exists(public_path().$about->source)){
                unlink(public_path().$about->source);
            }
            
        }
        event(new AboutEvent);
        $about->delete();
    }
    public function vue(){
        return DB::table('abouts')->orderBy('period')->limit(3)->get();
    }

}
