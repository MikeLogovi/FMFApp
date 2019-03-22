<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use App\Events\UserEvent;

class UserController extends Controller
{
    /**request->
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return User::first();
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
        //
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
        $user=User::findOrFail($id);
        if(!empty($request->name)){
           $user->name=$request->name;
        }
        if(!empty($request->email)){
            $this->validate($request,['email'=>'email|unique:users']);
            $user->email=$request->email;
        }
        if(!empty($request->password) or !empty($request->old_password) or !empty($request->conf_password)){
            if($request->old_password!=$user->password){
                return back();
            }
            else{

                $this->validate($request,['password'=>'required|same:conf_password','conf_password'=>'required']);
                $user->password=$request->password;
            }
        }
        if($request->file){
            unlink(public_path().$user->picture) ;
            $filename=file_upload($request->file,'/user/img/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
            $user->picture='/user/img/'.$filename;
        }
        $user->save();
        event(new UserEvent);
        return $user;
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
