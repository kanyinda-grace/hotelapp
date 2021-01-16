<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Room;
use App\Models\Book;
use App\Models\Hotel;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.client.index')->with(['users'=>User::where('is_admin','=',0)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }

     public function login()
    {
        return view('users.login');
    }

   public function auth(Request $request)
    {
        $this->validate($request,[
           
            'email'=>'required|email',
            'password' => 'required|max:12',    
        ]);
         if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
             return redirect('/');
         }else{
            return redirect()->back()->with(['fail'=>"Email ou mot de passe est incorrect"]);
         }
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
            'firstname'=>'required|max:12',
            'lastname'=>'required|max:12',
            'email'=>'required|email',
            'password' => 'required|max:10',
            'city'=>'required|max:12',
            
        ]);
        $user = new User();
        $user->password = bcrypt($request->password);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->adress = $request->adress;
        $user->save();


        return redirect()->route("user.create")->with(["success"=>"compte crée avec succees"]);
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
    {   $user =User::findOrFail($id);

        if (count($user->bookings)>0) {
            for ($i=0; $i <count($user->bookings) ; $i++) { 
                Room::find($user->bookings[$i]['room_id'])->update(['status'=>0]);
            }
            $user->bookings()->delete();
            $user->delete();
            return redirect()->route('users.index')->with(['success'=>'Client supprimé avec success']);
        }else{
            $user->delete();
            return redirect()->route('users.index')->with(['success'=>'Client supprimé avec success']);
        }
    
    }

    public function logout(){
        Auth::logout();
      return  redirect('/');
    }
    public function admin(){
        $rooms=Room::all();
        $bookings = Book::all();
        $users = User::all();
        $hotels = Hotel::all();
        return view("admin.index", compact('rooms','bookings','users','hotels'));
    }
    public function profile(){
           $rooms=Room::all();
           $bookings= Book::all();
           $users = User::all(); 
        return view('users.profile', compact('rooms', 'bookings', 'users'));
    }
}
