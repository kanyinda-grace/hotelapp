@extends("layouts.main-layout")
@section('header')
@include('includes.navbar')
@endsection
@section('styles')  
@endsection
@section('content')

    <div class="row mt-4">
  @foreach($hotels as $hotel)
      <div class=" col-md-3">
       <div class="card custum-card  bg-light p-2">
         <div class="card text-center">
         
          <a href=" {{route('hotels.show',$hotel->id)}}"><h4 class="card-title text-info">{{$hotel->name}}</h4></a>
           <img src=" {{URL::to('images/'.$hotel->photo)}}" style="height: 200px" class="mb-2 mt-1 img-fluid">
           <p class="lead"> {{$hotel->city}} </p>
       </div>
    </div>
    </div>
  @endforeach

</div>



@endsection



@section('footer')
@endsection