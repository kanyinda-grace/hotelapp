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
			@if(Session::has('success'))
			<div class="alert alert-success"> {{Session::get('success')}} </div>
			@endif
			<h3 class="card-title">Enregistre</h3>
			<form action=" {{route('users.store')}} " method="post">
				 @csrf
				<div class="form-group">
					<label for="nom">Nom*</label>
					<input type="text" name="firstname" id="firstname" placeholder="name" class="form-control">
					
				</div>
				<div class="form-group">
					<label for="email">Prenom*</label>
					<input type="text" name="lastname" id="lastname" placeholder="Prenom" class="form-control">
					
				</div>
				<div class="form-group">
					<label for="text">Adresse*</label>
					<input type="text" name="adress" id="adress" placeholder="adresse" class="form-control">
					
				</div>
				
				<div class="form-group">
					<label for="zipcode">Code postal</label>
					<input type="number" name="zipcode" id="zipcode" placeholder="code postal" class="form-control">
					
				</div> 
				<div class="form-group">
					<label for="ville">ville</label>
					<input type="text" name="city" id="city" placeholder="ville" class="form-control">
					
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" placeholder="email" class="form-control">
					
				</div>
				<div class="form-group">
					<label for="password">mot de passe</label>
					<input type="password" name="password" id="password" placeholder="password" class="form-control">
					
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