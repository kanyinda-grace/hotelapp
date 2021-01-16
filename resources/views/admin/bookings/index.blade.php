@extends("layouts.main-layout")
@section('header')
@include('includes.navbar')
@endsection
@section('styles')  
@endsection
@section('content')

<div class="row">
	<div class="col-md-12 mt-4">
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
      @endforeach
      @if(Session::has('success'))
      <div class="alert alert-success"> {{Session::get('success')}} </div>
      @endif
		  <div class="card mx-auto bg-light">
		  	  <div card-body>
            <div class="row">
                <a href=" {{route('rooms.create')}}" style="margin-left: 30px" class="btn btn-lg btn-primary float-md-left"><i class="">+</i></a>
            </div>
		  	  	  <table class="table">
		  	  	  	  <table class="table table-striped">
  <thead class="thead-danger">
    <tr>
      <th scope="col">Numero</th>
      <th scope="col">Etage</th>
      <th scope="col">Réservée par :</th>
      <th scope="col">Date debut</th>
      <th scope="col">Date fin</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($bookings as $book)
    <tr>
      <td> {{$book->room_id}} </td>
       <td> {{$book->room->floor}} </td>
      <td> {{$book->user->firstname}} {{$book->user->lastname}} </td>
       <td> {{$book->date_in}}</td>
       <td> {{$book->date_out}}</td>
     <td>
      <a href="{{route('booking.delete',$book->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-pencil">x</i> </a>
      </td>

      
    </tr>
    @endforeach
  </tbody>
</table>
		  	  	  
		  	  </div>
		  	
		  </div>
		
	</div>
</div>




@endsection



@section('footer')
@endsection