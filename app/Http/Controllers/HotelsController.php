<?php

namespace App\Http\Controllers;
use App\models\Hotel;
use App\Models\User;
use App\Models\Room;
use App\Models\Book;
use Auth;

use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        if (Auth::user()) {
           if (Auth::user()->is_admin) {
               return view('admin.hotels.index', compact('hotels'));
           }else
           {
            return view('hotels.index', compact("hotels"));
           }
        }else
        {
            return view('hotels.index', compact('hotels'));
  
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels  = Hotel::all();
        return view('admin.hotels.create' , compact('hotels'));
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
            'name'=>'required',
            'rooms'=>'required',
            'city'=>'required',
            'photo'=>"required"
        ]);

        $file =$request->photo;
        $name = time().'-'.$file->getClientOriginalName();
        $file->move(public_path().'/images/', $name);
        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->rooms = $request->rooms;
        $hotel->city = $request->city;
        $hotel->photo = $name;
        $hotel->save();
         $rooms=Room::all();
        $bookings = Book::all();
        $users = User::all();
        $hotels = Hotel::all();
        return view("admin.index", compact('rooms','bookings','users','hotels')); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('hotels.view')->with(['hotel'=>Hotel::find($id)]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        return view('admin.hotels.edit')->with(['hotels'=>Hotel::find($id)]);
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
         $this->validate($request,[
            'name'=>'required',
            'rooms'=>'required',
            'city'=>'required',
            
        ]);

        $hotel = Hotel::find($id);
        if ($request->hasFile('photo')) {
             $file =$request->photo;
        $name = time().'-'.$file->getClientOriginalName();
        $file->move(public_path().'/images/', $name);
        $hotel->photo = $name;
        }
        $hotel->name = $request->name;
        $hotel->rooms = $request->rooms;
        $hotel->city = $request->city;
        $hotel->update();
        return redirect()->route('hotels.index')->with(['succees'=>'hotel modifié avec suucees']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->rooms->delete();
        $hotel->delete();
        return redirect()->route('hotels.index')->with(['success'=>'hotel supprimé']);
    }

    public function search (Request $request){
        if ($request->hotel !=null) {
             $hotels = Hotel::where('name', $request->hotel)->get();
        return view('hotels.search-hotel', compact('hotels'));
        }else{
            $rooms = Room::where('date_in',null)
                                ->where('date_out',null)
                                ->where('status',0)
                                ->get();
                                return view('hotels.search-room',compact('rooms'));
        }
       
    }
}
