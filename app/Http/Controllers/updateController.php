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
        $this->validate(request(), [
            'updateDocName' => 'required|min:1|max:120'
        ]);

        $data = request()->all();

        $document = document::findOrFail($req->id);
        $document->name = $data['updateDocName'];
        $document->Station_id = $data['updateStorePlace'];

        $document->save();
        return redirect('/home');
    }
}
