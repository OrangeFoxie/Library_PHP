<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\document;
use App\Models\station;
use App\Models\room;

class insertController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDocument(Request $request)
    {
        $this->validate($request, [
            'customFile' => 'required|mimes:pdf|max:10000'
        ]);

        //
        $docs = new document;
        $nameDoc = $request->get('nameDoc'); 
            if($nameDoc == null){
                return back();
            }else{
                $docs->name = $nameDoc;
            }
        $docs->Station_id = $request->get('stationName'); 
        $docs->users_id = Auth::user()->id; 
        $fileName = $request->file('customFile')->getClientOriginalName();
        $docs->path = $request->file('customFile')->store('Documents');

        $docs->save();
        return back();
    }

    public function storeStation(Request $request)
    {
        //
        $sta = new station;
        $nameSta = $request->get('nameSta'); 
            if($nameSta == null){
                return back();
            }else{
                $sta->name = $nameSta;
            }
        $sta->Room_id = $request->get('roomName'); 

        $sta->save();
        return back();
    }

    public function storeRoom(Request $request)
    {
        //
        $Room = new room;
        $nameRoom = $request->get('nameRoom'); 
            if($nameRoom == null){
                return back();
            }else{
                $Room->name = $nameRoom;
            }

        $Room->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
