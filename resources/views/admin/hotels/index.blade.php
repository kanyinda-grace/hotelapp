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
                <a href=" {{route('hotels.create')}}" style="margin-left: 30px" class="btn btn-lg btn-primary float-md-left"><i class="">+</i></a>
            </div>
              <table class="table">
                  <table class="table table-striped">
  <thead class="thead-danger">
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Libelle</th>
      <th scope="col">Chambres</th>
       <th scope="col">Ville</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($hotels as $hotel)
    <tr>
       <td> <img src=" {{URL::to('images/'.$hotel->photo)}} " width="50px" height="50px" class="img-fluid"></td>
       <td> {{$hotel->photo}} </td>
       <td> {{$hotel->name}} </td>
      <td> {{$hotel->rooms}} </td>
       <td> {{$hotel->city}}</td>
       <td>
     
      <a href="{{route('hotels.edit',$hotel->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-pencil">x</i> </a>
      
      <a href="{{route('hotel.delete',$hotel->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-pencil">x</i> </a>

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