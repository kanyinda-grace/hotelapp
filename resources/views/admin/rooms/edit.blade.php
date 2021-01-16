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
			<h3 class="card-title">Ajouter une chambre</h3>
			<form action="{{route('room.update',$room->id)}}" method="post">
				 @csrf
				<div class="form-group">
					<label for="nom">Numero</label>
					<input type="text" name="numero" id="numero" placeholder="numero" value="{{$room->numero}}" class="form-control">
					
				</div>
				<div class="form-group">
					<label for="email">Etage*</label>
					<input type="text" name="floor" id="floor" placeholder="floor" value="{{$room->floor}}" class="form-control">
					
				</div>
				
				<div class="form-group">
					<label for="email">Disponibilté*</label>
					<select name="status" id="status" class="form-control">
						<option value="1" {{($room->status==1) ? 'selected' : ""}}>Reservé</option>
					   <option value="0"  {{($room->status==0) ? 'selected' : ""}}>Disponible</option>

					</select>
					
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