<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Hotel bobo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('hotels.index')}}">Hotels</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('booking.index')}}">Reservation</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(!Auth::user())
          <a class="dropdown-item" href="{{route('user.create')}}">Inscription</a>
          
          <a class="dropdown-item" href="{{route('user.login')}}">Connexion</a>
          <div class="dropdown-divider"></div>
          @else
          @if(Auth::user()->is_admin)
             <a class="dropdown-item" href=" {{route('user.admin')}} ">Admin</a>
          @endif
<a class="dropdown-item" href="{{route('user.profile')}} ">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>
          <a class="dropdown-item" href=" {{route('user.logout')}} ">Deconnexion</a>
          @endif
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Recherche</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action=" {{route('hotel.search')}} ">
      @csrf
      <input class="form-control mr-sm-2" type="search" name="hotel" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>