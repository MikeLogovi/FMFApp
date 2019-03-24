<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\VideoCategory;
use App\Events\VideoEvent;
use Illuminate\Support\Facades\DB;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return ['paginate'=>Video::latest()->paginate(10),'count'=>Video::all()->count()];
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
        
        $this->validate($request,['name'=>'required|string|min:4|unique:videos|max:191','category'=>'required','description'=>'required']);
        
        $category=VideoCategory::find($request->category);
        if(empty($request->link)){
            $filename=file_upload($request->file,'/videos/',['mp4','MP4']);
            $video=Video::create(['name'=>$request->name,'source'=>'/videos/'.$filename,'description'=>$request->description,'category_id'=>(int)$request->category,'category_name'=>$category->name]);
        }
        else{
            $this->validate($request,['link'=>'url']);
            $video=Video::create(['name'=>$request->name,'link'=>$request->link,'description'=>$request->description,'category_id'=>(int)$request->category,'category_name'=>$category->name]);
        }
       
        event(new VideoEvent);
        return $video;
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
        $video=Video::findOrFail($id);
        $category=VideoCategory::find($request->category);
        if(!empty($request->name)){
            $this->validate($request,['name'=>'string|min:4|max:191|unique:videos']);
            $video->name=$request->name;
        }
        if(!empty($request->category)){
            
            $video->category_name=$category->name;
        }
        if(!empty($request->description)){
            
            $video->description=$request->description;
        }
        
        if(!empty($request->file)){
            unlink(public_path().$video->source) ;
            $filename=file_upload($request->file,'/videos/',['mp4','MP4']);
            $video->source='/videos/'.$filename;
        }
        if(!empty($request->link)){
            $video->link=$request->link;
        }
        $video->save();
        event(new VideoEvent);
        return ['message'=>'Video updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video=Video::findOrFail($id);
        if($video->source){
            unlink(public_path().$video->source);
        }
        $video->delete();
        event(new VideoEvent);
        return ['message'=>'Video deleted'];
    }
   
    public function search(){
        $videos=null;
         if($search=\Request::get('query')){
             $videos=Video::where(function($query) use ($search){
                  $query->where('name','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%");
             })->paginate(10);
             
         }
         else{
            $videos=DB::table('videos')->inRandomOrder()->paginate(3);
         }
         return $videos;
    }
}
