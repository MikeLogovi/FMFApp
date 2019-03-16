<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use App\Events\AboutEvent;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return About::latest()->paginate(10);
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
        $this->validate($request,['file'=>'required','title'=>'required','period'=>'required','history'=>'required']);
        $filename=file_upload($request,'/about/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
        $about= About::create(['title'=>$request->title,'period'=>$request->period,'source'=>'/about/'.$filename,'history'=>$request->history]);
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
            $this->validate($request,['file'=>'image']);
            $filename=file_upload($request,'/about/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
            $about->source='/about/'.$filename;
        }
        if(!empty($request->title)){
            $about->title=$request->title;
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
        event(new AboutEvent);
        $about->delete();
    }

}
