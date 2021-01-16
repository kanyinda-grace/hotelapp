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
      <th scope="col">Hotel</th>
      <th scope="col">Numero</th>
      <th scope="col">Etage</th>
      <th scope="col">Disponibilité</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($rooms as $room)
    <tr>
      
      <td> {{$room->hotel->name}} </td>
      <td> {{$room->numero}} </td>
       <td> {{$room->numero}}</td>
       <td>
     
      @if($room->status==0)
      <div class="btn btn-outline-info">Disponible</div>
      @else
       <div class="btn btn-outline-danger">Reservée</div>
       @endif
      <td>
      <a href="{{route('rooms.edit',$room->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-pencil">x</i> </a>
      
      <a href="{{route('room.delete',$room->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-pencil">x</i> </a>

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