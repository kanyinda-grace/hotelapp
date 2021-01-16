@extends("layouts.main-layout")



@section('header')
@include('includes.navbar')
@endsection



@section('styles')
  
@endsection

@section('content')
<div class="row">
	<div class="col-md-12 mt-4">
		  <div class="card mx-auto bg-light">
		  	  <div card-body>
            @if(count($errors)>0)
            @foreach($errors->all() as $error)
                  <div style="margin-bottom: 10px" class="alert alert-danger"> {{$error}} </div>
            @endforeach
            @endif
            @if(Session::has('success'))
              <div style="margin-bottom: 10px" class="alert alert-success"> {{Session::get('success')}} </div>
            @endif
		  	  	  <table class="table">
		  	  	  	  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Hotel</th>
      <th scope="col">Numero chambre</th>
      <th scope="col">Etage</th>
      <th scope="col">Disponibilité</th>
    </tr>
  </thead>
  <tbody>
    @foreach($rooms as $room)
    <tr>
      <td>{{$room->hotel->name}}</td>
      <td>{{$room->numero}}</td>
      <td>{{$room->floor}}</td>
      <td>
        @if($room->status)
         <div class="btn btn-outline-danger" data-toggle="modal">Reservé</div>
         @else 
         @if(Auth::user())
        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$room->numero}}">Reserver</button>
        @else
        <a href=" {{route('user.login')}} " class="btn btn-outline-danger"> Reserver </a>
         @endif 
         @endif 
    </td>
    </tr>  

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$room->numero}}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reserver chambre numero {{$room->numero}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('booking.store')}}" method="post">
      @csrf
      <div class="modal-body">
        <div class="form-group">

          <label for="datedebut">Date debut : </label>
          <input type="date" class="form-control" name="datedebut">

       </div>
       <div class="form-group">
         <label for="dateFin">date fin</label>
         <input type="date" class="form-control" name="datefin">
         <input type="hidden" class="form-control" name="room_id" value="{{$room->id}}">
       </div>
           


        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button  type="submit" class="btn btn-primary">Valider</button>
      </div>
      </form>
    </div>
  </div>
</div>

    @endforeach
  </tbody>
 </table>
	</div> 	
	</div>	
	</div>



@endsection



@section('footer')
@endsection