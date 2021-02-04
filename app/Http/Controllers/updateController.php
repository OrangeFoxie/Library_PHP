<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\document;

class updateController extends Controller
{
    //
    public function upDocument(Request $req){
        $this->validate(request(), [
            'updateDocName' => 'required|min:1|max:120',
            'updateStorePlace' => 'required',
            'updateFile' => 'mimes:pdf|max:2048',
        ]);

        $data = request()->all();

        $document = document::findOrFail($req->id);
        $document->name = $data['updateDocName'];
        $document->Station_id = $data['updateStorePlace'];

        $document->path = $req->file('updateFile')->store('Docs','public');

        $document->save();
        return redirect(route('updatepdf',$req->id));
    }
}
