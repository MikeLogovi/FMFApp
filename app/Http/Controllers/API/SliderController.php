<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Events\SliderEvent;
use Illuminate\Support\Facades\DB;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        return ['paginate'=>Slider::latest()->paginate(10),'count'=>Slider::all()->count()];
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
        $filename=file_upload($request->file,'/slide/img/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
        $slider= Slider::create(['name'=>$request->name,'source'=>'/slide/img/'.$filename,'title'=>$request->title,'subtitle'=>$request->subtitle]);
        event(new SliderEvent);
        return $slider;
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
        $slider=Slider::findOrFail($id);
        if(!empty($request->file)){
            unlink(public_path().$slider->source);
            $filename=file_upload($request->file,'/slide/img/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);

            $slider->source='/slide/img/'.$filename;
        }
        if(!empty($request->name)){
            $slider->name=$request->name;
        }
        if(!empty($request->title)){
            $slider->title=$request->title;
        }
        if(!empty($request->subtitle)){
            $slider->subtitle=$request->subtitle;
        }
        $slider->save();
        event(new SliderEvent);
        return $slider;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::findOrFail($id);
        unlink(public_path().$slider->source);
        $slider->delete();
        event(new SliderEvent);
        return ['message'=>'Slider deleted'];
    }
    public function vue()
    {
        return DB::table('sliders')->get();
    }
    
}
