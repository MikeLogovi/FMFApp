<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\DB;
use App\Events\PostEvent;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        return  Post::latest()->paginate(10);
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
        $this->validate($request,['title'=>'required|min:3|max:191|unique:posts','description'=>'required','written_at'=>'required','author'=>'required']);
        if(!empty($request->attached_link)){
            $this->validate($request,['attached_link'=>'url']);
        }
        $filename=null;
        $imagename=file_upload($request->attached_image,'/posts/img/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
        if(!empty($request->attached_file)){
            $filename=file_upload($request->attached_file,'/posts/files/',['pdf','PDF','word','WORD']);
            $post=Post::create(['title'=>$request->title,'description'=>$request->description,'author'=>$request->author,'written_at'=>$request->written_at,'attached_link'=>$request->attached_link,'attached_image'=>'/posts/img/'.$imagename,'attached_file'=>'/posts/files/'.$filename]);
        }
        else{
            $post=Post::create(['title'=>$request->title,'description'=>$request->description,'author'=>$request->author,'written_at'=>$request->written_at,'attached_link'=>$request->attached_link,'attached_image'=>'/posts/img/'.$imagename]);
        }
        event(new PostEvent);
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        return  Post::findOrFail($id);
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
        $post=Post::findOrFail($id);
        if(!empty($request->title)){
            $this->validate($request,['title'=>'unique:posts']);
            $post->title=$request->title;
        }
        if(!empty($request->description)){
            $post->description=$request->description;
        }
        if(!empty($request->author)){
            $post->author=$request->author;
        }
        if(!empty($request->written_at)){
            $post->written_at=$request->written_at;
        }
        if(!empty($request->attached_link)){
            $this->validate($request,['attached_link'=>'url']);
            $post->attached_link=$request->attached_link;
        }
        if(!empty($request->attached_image)){
            unlink(public_path().$post->attached_image);
            $imagename=file_upload($request->attached_image,'/posts/img/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
            $post->attached_image='/posts/img/'.$imagename;
        }
        if(!empty($request->attached_file)){
            unlink(public_path().$post->attached_file);
            $filename=file_upload($request->attached_file,'/posts/files/',['pdf','word']);
            $post->attached_file='/posts/files/'.$filename;
        }
        $post->save();
        event(new PostEvent);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        unlink(public_path().$post->attached_image);
        if($post->attached_file!=NULL){
            unlink(public_path().$post->attached_file);
        }
        $post->delete();
        event(new PostEvent);
    }
    public function vue()
    {
        return  DB::table('posts')->orderBy('created_at','desc')->limit(3)->get();
    }
}
