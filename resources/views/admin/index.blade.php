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
    <div class="alert alert-danger"> {{$error}} </div>
    @endforeach
    @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
    @endif
    <div class="row">
     

      <div class="col-md-3">
        <a href=" {{route('booking.index')}} " style="text-decoration: none;color: black">
        <div class="card mx-auto bg-light text-center text-blue">
           <div class="card-body">
            <i class="fas fa-book fa-4x d-block mb-3">
              
            </i>
            <h2><span class="badge badge-dark"> {{count($bookings)}} </span>
            </h2>
             
           </div>
           
      </div>
      </a>
    </div>



     <div class="col-md-3">
      <a href="  {{route('rooms.index')}} " style="text-decoration: none;color: black">
        <div class="card mx-auto bg-light text-center text-blue">
           <div class="card-body">
            <i class="fas fa-home  fa-4x d-block mb-3">
              
            </i>
            <h2>  <span class="badge badge-dark"> {{count($rooms)}}</span>
            </h2>
             
           </div></a>
      </div>
   </div>

    <div class="col-md-3">
      <a href="  {{route('hotels.index')}} " style="text-decoration: none;color: black">
        <div class="card mx-auto bg-light text-center text-blue">
           <div class="card-body">
            <i class="fas fa-home  fa-4x d-block mb-3">
              
            </i>
            <h2>  <span class="badge badge-dark"> {{count($hotels)}}</span>
            </h2>
             
           </div></a>
      </div>
   </div>


     <div class="col-md-3">
      <a href=" {{route('users.index')}} " style="text-decoration: none;color: black">
        <div class="card mx-auto bg-light text-center text-blue">
           <div class="card-body">
            <i class="fas fa-user fa-4x d-block mb-3">
              
            </i>
            <h2> <span class="badge badge-dark">{{count($users)-1}} </span>
            </h2>
             
           </div>
      </a>
      </div>



    </div>
          
    </div>
    
    
  </div>
</div>



@endsection



@section('footer')
@endsection