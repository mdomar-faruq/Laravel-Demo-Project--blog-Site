<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="/">Clean Blog</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('Index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('Shop_Index')}}">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('About')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('Contact')}}">Contact</a>
        </li>
        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{route('dashboard')}}">dashboard</a>
        </li>
        <li class="nav-item">
          <form method="POST" id="logout-form" action="{{route('logout')}}" >@csrf</form>
          <a class="nav-link" href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
        </li>

        @else

        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
        @endif

      </ul>
    </div>
  </div>
</nav>
