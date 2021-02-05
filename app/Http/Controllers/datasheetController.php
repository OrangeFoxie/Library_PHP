<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use URL;
use App\Models\document;
use App\Models\station;
use App\Models\room;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class datasheetController extends Controller
{
    //
    public function showDocs(){
        $docs = DB::table('documents')
        ->join('stations','stations.id','=','Station_id')
        ->join('rooms','rooms.id','=','Room_id')
        ->join('users','users.id','=','users_id')
        ->select('documents.id','documents.name', 'documents.path as path', 'stations.name as stationName', 'rooms.name as roomName', 'users.username as users_name','users.name as usrname')        
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
        $document = document::findOrFail($req->id); //document::where('documents.id',$req->id)->first()
        //$document->fresh();
        $filePath = $document->path;
        $fileName = $document->name;

        // file found or not ;7
        if(!empty($filePath)) {
            $pathToFile = ( public_path().'/uploads/'.$filePath );

            if(file_exists($pathToFile)){
                $headers = ['Content-Disposition' => 'inline; filename="'.$fileName.'.pdf"'];
                return response()->file($pathToFile,$headers);
                // return view('getDocument',compact('pathToFile','fileName'));                
            } else{
                abort(404);
            }    
        }else{
            abort(404);
        }                  
    }

    public function updatePDF(Request $req){
        $document = document::findOrFail($req->id);
        $docID = $document->id;     
        $docName = $document->name;
        $docStationID = $document->Station_id;
        $docUserID = $document->users_id;
        $docDateCreate = $document->created_at;
        $docDateUpdate = $document->updated_at;

        $station = station::where('stations.id','=',$docStationID)->first();
        $docStationId = $station->Room_id;
        $docStation = $station->name;

        $room = room::where('rooms.id','=',$docStationId)->first();
        $docRoom = $room->name;

        $user = User::where('users.id','=',$docUserID)->first();
        $docUserName = $user->name;

        $docURL = $req->id;

        $docs = $this->showdocs()->docs;
        $stations = $this->showdocs()->stations;
        $rooms = $this->showdocs()->rooms;

        return view('updatepdf',compact('docID','docRoom','docName','docStation','docStationID','docStationId','docRoom','docUserName','docDateCreate','docDateUpdate','docURL'
                    ,'docs','stations','rooms'));
    }
}
