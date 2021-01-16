<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Book;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::user()) {
            if (Auth::user()->is_admin) {
                return view('admin.bookings.index')->with(['bookings'=>Book::all()]);
            }else{
                return view('booking')->with(['rooms'=>Room::all()]);
            }
        }else{
            return view('booking')->with(['rooms'=>Room::all()]);
        }
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'datedebut'=>'required|date',
            'datefin' => 'required|date',
            'room_id'=>'required'
        ]);
        Book::create([
            'date_in'=>$request->datedebut,'date_out'=>$request->datefin,'user_id'=>Auth::user()->id,'room_id'=>$request->room_id]);
        $room = Room::findOrFail($request->room_id);
        $room->status =1;
        $room->datefin = $request->datedebut;
        $room->date_out = $request->datefin;
        $room->update();

          return redirect()->route('booking.index')->with(['success'=>'Reservation effectué avec succéé']);
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
        $booking = Book::findOrFail($id);
        Room::findOrFail($booking->room_id)->update(['status'=>0]);
        $booking->delete();
        return redirect()->route('booking.index')->with(['success'=>'Reservation supprimée avec success']);
    }
}
