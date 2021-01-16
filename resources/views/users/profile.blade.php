@extends("layouts.main-layout")

@section('styles')

@endsection


@section('header')
@include('includes.navbar')
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 mt-4">
		<div class="card bg-grey" >
			

		<div class="card-body" style="">
			
			@foreach($errors->all() as $error)
				<div class="alert alert-danger">{{$error}}</div>
			@endforeach
			@if(Session::has('success'))
			<div class="alert alert-success"> {{Session::get('success')}} </div>
			@endif
			<h3 class="card-title text-white"></h3>
			<h3 class="card-title text-white"></h3>
			<ul>
				<li class="list-group-item">Nom : {{Auth::user()->firstname}} </li>
				<li class="list-group-item">Postnom : {{Auth::user()->lastname}}</li>
				<li class="list-group-item">Adresse : {{Auth::user()->adress}}</li>
				<li class="list-group-item">Ville : {{Auth::user()->city}}</li>
				<li class="list-group-item">Email : {{Auth::user()->email}}</li>
			</ul>
		</div>			
		</div>
		
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@if(count(Auth::user()->bookings)>0)
		<table class="table">
		  	  	  	  <table class="table table-striped">
  <thead class="thead-danger">
    <tr>
    <th scope="col">Hotel</th>
      <th scope="col">Numero</th>
      <th scope="col">Etage</th>
      <th scope="col">Réservée par :</th>
      <th scope="col">Date debut</th>
      <th scope="col">Date fin</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach(Auth::user()->bookings as $book)
    <tr>
    <td> {{$book->room->hotel->name}} </td>
      <td> {{$book->room->numero}} </td>
       <td> {{$book->room->floor}} </td>
      <td> {{$book->user->firstname}}  </td>
       <td> {{$book->date_in}}</td>
       <td> {{$book->date_out}}</td>
     <td>
      <a href="{{route('booking.delete',$book->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-pencil">x</i> </a>
      </td>

      
    </tr>
    @endforeach
  </tbody>
</table>
@else
<div class="alert alert-info">Aucune réservation</div>
	</div>
</div>
@endif
@endsection

@section('script')

@endsection

@section('footer')
   @include('includes.footer')
@endsection