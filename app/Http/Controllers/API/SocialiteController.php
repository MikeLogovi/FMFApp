<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Socialite;
use App\Events\SocialiteEvent;
class SocialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Socialite::latest()->paginate(10);
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
       $this->validate($request,['social_media'=>'required','link'=>'required|url']);
       $socialite=Socialite::create(['social_media'=>$request->social_media,'link'=>$request->link]);
       event(new SocialiteEvent);
       return $socialite;
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
        $socialite=Socialite::find($id);
        if(!empty($request->social_media)){
            $socialite->social_media=$request->social_media;
        }
        if(!empty($request->link)){
            $socialite->link=$request->link;
        }
        $socialite->save();
        event(new SocialiteEvent);
        return $socialite;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialite=Socialite::find($id);
        event(new SocialiteEvent);
        $socialite->delete();
    }
}
