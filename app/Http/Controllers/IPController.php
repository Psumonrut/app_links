<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IPController extends Controller
{
    public function ipTracker (){

       return view('page.ip');
    }

    public function ipTrackerDetail (Request $request){
       $arr_ip = geoip()->getLocation('Ip here');
       dd($arr_ip);

    }
}
