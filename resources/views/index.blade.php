@extends("layouts.main-layout")
@section('styles')
@endsection
@section('header')
@include('includes.navbar')
@endsection
@section('content')
<div class="row">
	<div class="col-md-6 mt-4">
		<img src="{{URL::to('images/lol.JPG')}}" height="350" alt="">
	</div>
	<div class="col-md-4 mx-auto mt-4">
		<div class="card-body">
			<form action=" {{route('hotel.search')}} " method="post">
				<div class="form-group">
					<label for="datedebut">Date debut</label>
					<input type="date" class="form-control" name="datedebut">
				</div>
				<div class="form-group">
					<label for="datefin">Date debut</label>
					<input type="date" class="form-control" name="datefin">
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" name="submit">Recherche</button>
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