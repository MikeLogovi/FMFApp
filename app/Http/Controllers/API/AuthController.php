<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function login(Request $request){
        $this->validate($request,['email'=>'required|email','password'=>'required']);
       
        $http= new \GuzzleHttp\Client;
         
         try{
             $response=$http->post(config('services.passport.login_endpoint'),[
                 'form_params'=>[
                     'grant_type'=>'password',
                     'client_id'=>config('services.passport.client_id'),
                     'client_secret'=>config('services.passport.client_secret'),
                     'username'=>$request->email,
                     'password'=>$request->password,
                 ]
             ]);
             dd($response);
             return $response->getBody();
         }
         catch(\GuzzleHttp\Exception\BadResponseException $e){
            if($e->getCode()==400){
                return response()->json('Invalid request,please enter username or password',$e->getCode());
            }
            else if($e->getCode()==401){
                return response()->json('Your credentials are incorrect,please try it again',$e->getCode());
            }
            return response()->json('Something went wrong on the server',$e->getCode());
         }
    }
    public function logout(){
        auth()->user()->tokens->each(function($token,$key){
            $token->delete();
        });
        return response()->json('Logged out successfully');
    }
}
