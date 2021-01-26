<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use App\Models\room;

class TestDB extends Controller
{
    //
    public function index(){
        // $db = DB::table('password')->get();
        // if( $db != null ){
        //     return $db;
        // }else{
        //     return 'false';
        // }

        // return user::all();

        return room::all();
    }
}
