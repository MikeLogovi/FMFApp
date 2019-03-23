<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use App\Events\UserEvent;
use Validator;

class UserController extends Controller
{
    /**request->
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
    
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
        $this->user=User::findOrFail($id);
        if(!empty($request->name)){
            $this->user->name=$request->name;
        }
        if(!empty($request->email)){
            $this->validate($request,['email'=>'email|unique:users']);
            $this->user->email=$request->email;
        }
        if(!empty($request->password) or !empty($request->old_password) or !empty($request->conf_password)){
                Validator::make($request->all(),['password'=>'required|same:conf_password','conf_password'=>'required',
                'old_password'=>[
                         'required',
                         function($attribute,$value,$fail){
                             if(!Hash::check($value,$this->user->password)){
                                $fail("The old password field doesn't match with the old real password.");
                            }
                         }
                     ]
                        ],[
                            'required'=>'This field is required',
                            'same'=>'You have not well confirmed your new password'
                        ])->validate();
                $this->user->password=Hash::make($request->password);
            
        }
        if($request->file){
            if($this->user->picture){
                unlink(public_path().$this->user->picture) ;
            }
            $filename=file_upload($request->file,'/user/img/',['jpg','JPG','JPEG','PNG','png','GIF','gif']);
            $this->user->picture='/user/img/'.$filename;
        }
        $this->user->save();
        event(new UserEvent);
        return $this->user;
       
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
