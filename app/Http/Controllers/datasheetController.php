<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class datasheetController extends Controller
{
    //
    public function showDocs(){
        $docs = DB::table('document')
        ->join('user','user.id','=','User_id')
        ->join('station','station.id','=','Station_id')
        ->join('room','room.id','=','Station_id')
        ->select('document.id','document.name','user.name as usrname','station.name as stationName', 'room.name as roomName')        
        ->orderBy('document.id')
        ->get();
        // $users= DB::table('user')->get();
        // $stations = DB::table('station')->get();

        if( $docs != null ){
            return view('datasheet', ['doc' => $docs]);
        }else{
            return view('datasheet');
        }
    }
}
