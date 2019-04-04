<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Website;
use App\Events\WebsiteStateChanged;
class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return Website::first();
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
        $website=Website::first();
        if(!empty($request->name)){
            $website->name=$request->name;
        }
        if(!empty($request->file)){
            if(file_exists(public_path().$website->logo)){
                unlink(public_path().$website->logo);
            }
            $filename=file_upload($request->file,'/website/logo/',['jpeg','jpg','png','gif','JPEG','JPG','PNG','GIF']);
            $website->logo='/website/logo/'.$filename;
        }
        if(!empty($request->quote)){
            $website->quote=$request->quote;
        }
        if(!empty($request->banner_quote)){
            $website->banner_quote=$request->banner_quote;
        }
        if(!empty($request->about_quote)){
            $website->about_quote=$request->about_quote;
        }
        $website->save();
        event(new WebsiteStateChanged);
        return $website;

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
