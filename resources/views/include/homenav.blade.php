<style >
 .orange
 {
   color:orange;

 }
  i:hover
  {
    color: orange;
  }
</style>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    @if(Request::is('/'))
    <a class="navbar-brand  " @if($homenav == 'slash') style="color:orange;" @endif href="{{url('/')}}">Kutholshin</a>
    @else
    <a class="navbar-brand" style="margin:0;padding:0;" href="{{url('/')}}"><i class="fas fa-home" style="font-size:2em;"></i></a>
    @endif
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link @if($homenav == 'newposts') active @endif" href="{{url('/blog')}}"><i class="fa fa-newspaper @if($homenav == 'newposts') orange @endif"></i> New Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if($homenav == 'gallery' || $homenav == 'moregallery') active @endif" href="{{url('/gallery')}}"><i class="fas fa-images @if($homenav == 'gallery' || $homenav == 'moregallery') orange @endif"></i> Gallery</a>
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
          <a class="nav-link @if($homenav == 'register') active @endif" href="{{url('/register')}}"><i class="fas fa-user-plus @if($homenav == 'register') orange @endif"></i> Register</a>
        </li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if($homenav == 'mygallery' || $homenav == 'createpost' || $homenav == 'mypost') active  @endif" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user @if($homenav == 'mygallery' || $homenav == 'createpost' || $homenav == 'mypost') orange @endif"></i> {{ Auth::user()->name}}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
            <a class="dropdown-item @if($homenav == 'mygallery') active @endif" href="{{url('/yourgallery/'.Auth::user()->id)}}"><i class="fas fa-images @if($homenav == 'mygallery') orange @endif"></i> My Gallery</a>
            <a class="dropdown-item @if($homenav == 'createpost') active @endif" href="{{url('/addpost')}}"><i class="fa fa-newspaper @if($homenav == 'createpost') orange @endif"></i> Create Post</a>
            <a class="dropdown-item @if($homenav == 'mypost') active @endif" href="{{url('/mypost/'.Auth::user()->id)}}"><i class="fa fa-newspaper @if($homenav == 'mypost') orange @endif"></i> My Post</a>
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
