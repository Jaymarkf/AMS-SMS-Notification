<nav class="pl-5 navbar navbar-expand-lg navbar-dark" style="background-color:#13222a">

  @if(Route::current()->uri == 'login')<a class="navbar-brand link" data-toggle="tooltip" title="Home" href="/">Home</a>
  @else
  <a class="navbar-brand link" data-toggle="tooltip" title="Admin Login" href="login">Admin</a>
  @endif
  <a class="navbar-brand link" data-toggle="tooltip" title="Client Login" href="#">Client</a>
  </div>
</nav>