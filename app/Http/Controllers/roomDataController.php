<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\room;

class roomDataController extends Controller
{
    //
    public function showRooms(){
        $rooms = DB::table('room')
        ->select('room.name as rName')
        ->get();       

        return view('roominfo', ['room'=>$rooms]);
    }
}
