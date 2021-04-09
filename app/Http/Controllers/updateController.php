<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\document;
use Illuminate\Support\Facades\Storage;

class updateController extends Controller
{
    //
    public function upDocument(Request $req){
        $this->validate(request(), [
            'updateDocName' => 'required|min:1|max:120',
            'updateStorePlace' => 'required',
            'updateFile' => 'mimes:pdf|nullable|max:5000',
        ]);

        $document = document::findOrFail($req->id);
        $data = request()->all();

        $document->name = $data['updateDocName'];
        $document->Station_id = $data['updateStorePlace'];    

        if($req->file('updateFile')){
            $document->path = $req->file('updateFile')->store('Docs','public');
            $document->save();
            return redirect(route('updatepdf',$req->id));    
        }else{
            $document->save();
            return redirect(route('updatepdf',$req->id));
        }
    }
}
