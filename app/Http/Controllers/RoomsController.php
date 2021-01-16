<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Hotel;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels  = Hotel::all();
   return view('admin.rooms.add', compact('hotels'));        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'numero'=>'required',
            'floor'=>'required',
            'status'=>'required',
            'hotel_id'=>'required'
        ]);
       $room = new Room();
       $room->numero = $request->numero;
       $room->floor = $request->floor;
       $room->status= $request->status;
       $room->hotel_id = $request->hotel_id;
       $room->save();
        return redirect()->route('user.admin')->with(['success'=>'chambre ajoutée']);
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
        $room = Room::findOrFail($id);
       return view('admin.rooms.edit', compact('room')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
          'numero'=>'required',
          'floor'=>'required',
          'status'=>'required'
        ]);

        Room::findOrFail($id)->update(['numero'=>$request->numero,'floor'=>$request->floor,'status'=>$request->status]);
        return redirect()->route('user.admin')->with(['success'=>'Chambre modifiée']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::findOrFail($id)->delete();
        return redirect()->route('user.admin')->with(['success'=>"Chambre supprimé"]);
    }
}
