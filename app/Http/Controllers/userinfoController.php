<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\document;
use App\Models\station;
use App\Models\room;

class userinfoController extends Controller
{
    //
    // static function getUser(Request $request){
    //     $user = user::findOrFail($request->id);
        
    //     $usrName = $user->name;
    //     return $usrName;
    // }
    public function showUser(Request $request){
        $user = user::findOrFail($request->id);
        $usrID = $user->id;
        $usrName = $user->name;
        $logInName = $user->username;
        $email = $user->email;
        $dateJoin = $user->created_at;
        $dateUpdate = $user->updated_at;

        $docs = DB::table('documents')
        ->where('documents.users_id','=',$usrID)
        ->join('stations','stations.id','=','Station_id')
        ->join('rooms','rooms.id','=','Room_id')
        ->select(   'documents.id as docID', 
                    'documents.name as docName',
                    'documents.created_at as docNew',
                    'documents.updated_at as docUpdate',
                    'stations.name as stationName',
                    'rooms.name as roomName')
        ->orderBy('docID')
        ->get();

        // $doc2 = DB::table('documents')
        // ->join('rooms','Rooms_id','=','rooms.id')
        // ->select('*')
        // ->get();

        return(view('userinfo', compact('usrName','logInName','email','dateJoin','dateUpdate','docs')));
    }
}
