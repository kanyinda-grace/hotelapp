@extends("layouts.main-layout")
@section('header')
@include('includes.navbar')
@endsection
@section('styles')  
@endsection
@section('content')

<div class="row mt-4">
    <div class="col-md-8 mx-auto">
       <div class="card bg-light p-2">
         <div class="card-body text-center">
          <h4 class="card-title text-info"> {{$hotel->name}} </h4>
           <img src=" {{URL::to('images/'.$hotel->photo)}}" style="height:500px" alt="" class="mb-2 mt-1 img-fluid">
           <p class="lead"> {{$hotel->city}} </p>
         </div>
       </div>
    </div>
    <table class="table">
		  	  	  	  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Numero</th>
      <th scope="col">Etage</th>
      <th scope="col">Disponibilité</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hotel->rooms()->get() as $room)
    <tr>
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




@endsection



@section('footer')
@endsection