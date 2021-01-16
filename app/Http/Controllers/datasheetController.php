<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class datasheetController extends Controller
{
    //
    public function showDocs(){
        $docs = DB::table('document')
        ->join('station','station.id','=','Station_id')
        ->join('room','room.id','=','Station_id')
        ->join('users','users.id','=','users_id')
        ->select('document.id','document.name','station.name as stationName', 'room.name as roomName', 'users.name as users_name')        
        ->orderBy('document.id')
        ->get();

        if( $docs != null ){
            return view('datasheet', ['doc' => $docs]);
        }else{
            return view('datasheet');
        }
    }
}
