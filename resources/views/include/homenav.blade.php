<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/blog')}}"><i class="fa fa-newspaper"></i> New Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/gallery')}}"><i class="fas fa-images"></i> Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html"><i class="fas fa-font"></i> About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Portfolio
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
            <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
            <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
            <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
            <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
            <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
          </div>
        </li>


        @if(Auth::guest())
        <li class="nav-item ">
          <a class="nav-link" href="{{url('/login')}}"><i class="fas fa-sign-in-alt"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/register')}}"><i class="fas fa-user-plus"></i> Register</a>
        </li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>{{ Auth::user()->name}}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
            <a class="dropdown-item" href="{{url('/yourgallery/'.Auth::user()->id)}}"><i class="fas fa-images"></i> My Gallery</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                         <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </div>



        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/cpanel') }}"><i class="fas fa-cogs"></i>.</a>
        </li>
      </ul>
    </div>
  </div>



</nav>
