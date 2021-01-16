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
			<h3 class="card-title">Ajouter une hotel</h3>
			<form action=" {{route('hotels.store')}} " method="post" enctype="multipart/form-data">
				 @csrf
				<div class="form-group">
					<label for="nom">Libelle</label>
					<input type="text" name="name" id="name" placeholder="Libelle" class="form-control">
					
				</div>
				<div class="form-group">
					<label for="email">Chambre</label>
					<input type="text" name="rooms" id="rooms" placeholder="Chambre" class="form-control">
					
				</div>
				<div class="form-group">
					<label for="email">Ville</label>
					<input type="text" name="city" id="city" placeholder="ville" class="form-control">
					
				</div>
				<div class="form-group">
					<label for="email">Photo</label>
					<input type="file" name="photo" id="photo"  class="form-control">
					
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