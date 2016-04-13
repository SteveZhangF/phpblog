<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Steve Always </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class=""><a href="/">Home</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::to('article/create') }}"><span class="glyphicon glyphicon-edit"></span> Publish Article</a></li>

            <li><a href="{{URL::to('article')}}">My Posts</a></li>

            <li><a href="{{URL::to('user/'. Auth::id() . '/edit')}}">My profile</a></li>
           
            <li role="separator" class="divider"></li>
           <li><a href="{{ URL::to('logout') }}"><span class=""></span> Exit</a></li>

          </ul>
        </li>
        @else
        <li><a href="{{ URL::to('register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="{{ URL::to('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>

       @endif
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>