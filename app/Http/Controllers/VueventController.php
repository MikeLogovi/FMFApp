<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VueventController extends Controller
{
    public function past(){
        updateEventPremiumState();
        return DB::table('events')->where('event_state',0)->paginate(3);
    }

    public function today(){
        updateEventPremiumState();
        return DB::table('events')->where('event_state',1)->paginate(3);
    }

    public function upcoming(){
        updateEventPremiumState();
        return DB::table('events')->where('event_state',2)->paginate(3);
    }
    

}
