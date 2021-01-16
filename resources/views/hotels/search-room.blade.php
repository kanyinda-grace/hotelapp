@extends("layouts.main-layout")
@section('header')
@include('includes.navbar')
@endsection
@section('styles')  
@endsection
@section('content')

    <div class="row mt-4">
  @foreach($rooms as $room)
      <div class=" col-md-3">
       <div class="card custum-card  bg-light p-2">
         <div class="card text-center">
         
          <a href=" {{route('hotels.show',$room->hotel->id)}}"><h4 class="card-title text-info">{{$room->hotel->name}}</h4></a>
           <img src=" {{URL::to('images/'.$room->hotel->photo)}}" style="height: 200px" class="mb-2 mt-1 img-fluid">
           <p class="lead"> {{$room->hotel->city}} </p>
       </div>
    </div>
    </div>
  @endforeach

</div>



@endsection



@section('footer')
@endsection