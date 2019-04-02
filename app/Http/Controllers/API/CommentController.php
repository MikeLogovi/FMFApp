<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Events\CommentEvent;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(){
        return ['paginate'=>Comment::latest()->paginate(10),'count'=>Comment::all()->count()];
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
        $this->validate($request,['fullName'=>'required|min:4|max:191','avatar'=>'required','comment'=>'required']);
        $filename=file_upload($request->file,'/comments/avatars/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
        $comment=Comment::create(['fullName'=>$request->fullName,'comment'=>$request->comment,'avatar'=>'/comments/avatars/'.$filename]);
        event(new CommentEvent);
        return $comment;
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
        $comment=Comment::findOrFail($id);
        if(!empty($request->fullName)){
            $comment->fullName=$request->fullName;
        }
        if(!empty($request->file)){
            if(file_exists(public_path().$comment->avatar)){
                unlink(public_path().$comment->avatar);
            }
            $filename=file_upload($request->file,'/comments/avatars/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
            
            $comment->avatar='/comments/avatars/'.$filename;
        }
        if(!empty($request->comment)){
            $comment->comment=$request->comment;
        }
        $comment->save();
        event(new CommentEvent);
        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::findOrFail($id);
        event(new CommentEvent);
        if($comment->avatar){
           if(file_exists(public_path().$comment->avatar)){
               unlink(public_path().$comment->avatar);
           }
        }
        $comment->delete();
    }
    public function vue()
    {
        return DB::table('comments')->orderBy('created_at', 'desc')->limit(3)->get(); 
    }
}
