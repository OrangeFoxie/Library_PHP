<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\document;

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
        ->select(   'documents.id as docID', 
                    'documents.name as docName',
                    'documents.users_id as urid')
        ->get();

        return(view('userinfo', compact('usrName','logInName','email','dateJoin','dateUpdate','docs')));
    }
}
