<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\document;
use App\Models\station;
use App\Models\room;

class updateController extends Controller
{
    //
    public function upDocument(Request $req){
        $document = document::findOrFail($req->id);
        $docName = $document->name;
        echo $docName;
    }
}
