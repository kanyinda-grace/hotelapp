@extends("layouts.main-layout")

@section('styles')

@endsection


@section('header')
@include('includes.navbar')
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 mt-4">
		<div class="card-body">
			@foreach($errors->all() as $error)
				<div class="alert alert-danger">{{$error}}</div>
			@endforeach
			@if(Session::has('fail'))
			<div class="alert alert-success"> {{Session::get('fail')}} </div>
			@endif
			<h3 class="card-title">Connexion</h3>
			<form action="{{route('user.auth')}}"  method="post">
				 @csrf
				<div class="form-group">
					<label for="email">Email*</label>
					<input type="email" name="email" id="email" placeholder="Email" class="form-control">
					<input type="password" name="password" style="margin-top: 10px" id="password" placeholder="password" class="form-control">
				</div>
				<div class="form-group">
					<button  class="btn btn-success" name="submit" type="submit">Valider</button>
				</div>
			</form>
			
		</div>
		
	</div>
</div>
@endsection

@section('script')

@endsection

@section('footer')
   @include('includes.footer')
@endsection