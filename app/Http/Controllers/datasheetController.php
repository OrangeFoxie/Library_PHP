<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use URL;
use App\Models\document;
use Illuminate\Support\Facades\Redirect;

class datasheetController extends Controller
{
    //
    public function showDocs(){
        $docs = DB::table('documents')
        ->join('stations','stations.id','=','Station_id')
        ->join('rooms','rooms.id','=','Room_id')
        ->join('users','users.id','=','users_id')
        ->select('documents.id','documents.name', 'documents.path as path', 'stations.name as stationName', 'rooms.name as roomName', 'users.username as users_name')        
        ->orderBy('documents.id')
        ->get();

        $rooms = DB::table('rooms')->get();     

        $stations = DB::table('stations')
        ->join('rooms','Room_id','=','rooms.id')
        ->select('rooms.name as RoomName', 'rooms.id as RoomID','stations.id as id', 'stations.name as name')
        ->orderBy('RoomID')
        ->get();        

        if( $docs && $rooms && $stations ){
            return view('datasheet', compact('docs','rooms','stations'));
        }else{
            return view('datasheet');
        }
    }

    public function showpdf(Request $req){

        $pdf = document::where('documents.id',$req->id)->first();
        $pdf->fresh();
        $pdf2 = $pdf->path;        

        if( ! document::exists($pdf2) ) {
            abort(404);
          }

        $pathToFile = URL::to('uploads/'.$pdf2);

        return Redirect::to($pathToFile);
    }        


    public function getDocument(Request $req)
    {
        $document = document::where('documents.id',$req->id)->first();
        $document->fresh();
        $filePath = $document->path;
    
        // file not found
        if( ! document::exists($filePath) ) {
          abort(404);
        }

        $pathToFile = ( public_path().'/uploads/'.$filePath );
        return response()->file($pathToFile);
    }
}
