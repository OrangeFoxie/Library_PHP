<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class datasheetController extends Controller
{
    //
    public function showDocs(){
        $docs = DB::table('documents')
        ->join('station','station.id','=','Station_id')
        ->join('room','room.id','=','Station_id')
        ->join('users','users.id','=','users_id')
        ->select('documents.id','documents.name','station.name as stationName', 'room.name as roomName', 'users.name as users_name')        
        ->orderBy('documents.id')
        ->get();

        $rooms = DB::table('room')->get();     

        $stations = DB::table('station')->get();        

        if( $docs && $rooms && $stations ){
            return view('datasheet', compact('docs','rooms','stations'));
        }else{
            return view('datasheet');
        }
    }
}
