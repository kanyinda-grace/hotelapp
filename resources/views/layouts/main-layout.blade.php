<!DOCTYPE html>
<html>
<head>
	<title>Hotel de la plaza</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{URL::to('js/bootstrap.min.js')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/fontawesome.min.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
 
	@yield('styles')
</head>
<body>

@yield('header')
<div class="container">
	@yield('content')

</div>
@yield('footer')
@yield('scripts')


<script src="{{URL::to('js/bootstrap.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</body>
</html>
