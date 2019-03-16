<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Flashy;
class MailController extends Controller
{
    public function send(Request $request){
         $this->validate($request,['name'=>'required','subject'=>'required|min:4|max:191','email'=>'required|email','message'=>'required']);
         $data= array(
             'name'=>$request->name,
             'email'=> $request->email,
             'subject'=>$request->subject,
             'message'=> $request->message
         );
         Mail::to('logovimike@gmail.com')->send(new SendMail($data));
         Flashy::message('Message received successfully');
         return $data;
    }
}
