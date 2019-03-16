<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\ImageCategory;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
        return Image::latest()->paginate(10);
    
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
        $this->validate($request,['name'=>'required|string|min:4|unique:images|max:191','category'=>'required']);
        $filename=file_upload($request,'/img/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
        $category=ImageCategory::find($request->category);
        $image=Image::create(['name'=>$request->name,'source'=>'/img/'.$filename,'category_id'=>(int)$request->category,'category_name'=>$category->name]);
       
        return $image;
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
        $image=Image::findOrFail($id);
        
        if(!empty($request->name)){
            $this->validate($request,['name'=>'string|min:4|max:191']);
            $image->name=$request->name;
        }
        if($request->category){
            $category=ImageCategory::find($request->category);
            $image->category_name=$category->name;
        }
        
        if($request->file){
            unlink(public_path().$image->source) ;
            $filename=file_upload($request,'/img/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
            $image->source='/img/'.$filename;
        }
       
        $image->save();
        return ['message'=>'Image updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Image::findOrFail($id);
        unlink(public_path().$image->source);
        $image->delete();
        return ['message'=>'Image deleted'];
    }
    
}