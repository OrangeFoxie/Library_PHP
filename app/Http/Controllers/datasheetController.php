<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class datasheetController extends Controller
{
    //
    public function showDocs(){
        $docs = DB::table('document')->get();
        $users= DB::table('user')->get();
        $locates = DB::table('station')->get();

        if( $docs != null ){
            return view('datasheet', ['doc' => $docs], ['user' => $users], ['location' => $locates]);
        }else{
            return view('datasheet');
        }
    }
}
