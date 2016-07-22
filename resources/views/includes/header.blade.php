@include('includes.signin')
@include('includes.signup')
<header>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{route('home')}}">RMD</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <div class="nav navbar-nav navbar-right">
	      	@if(!Auth::check())
	        	<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#signinModal">Sign In/Sign Up</button>
	        @else
	        	<p class="navbar-text">Hello {{ucfirst(Auth::user()->first_name).' '.ucfirst(Auth::user()->last_name)}}</p>
	        	<a href="{{route('logout')}}" class="btn btn-default navbar-btn">Logout</a>
	        @endif
	      </div>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>	
</header><!-- /header -->