<!DOCTYPE html>
<html>
    <head>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="{{URL::to('css/mystyles.css')}}">
    </head>
    <body>
    	@include('includes.header')
    	<div class="container">
			@yield('content')
    	</div>
    	@include('includes.footer')
    	<?php
    		if(count($errors))
    			print_r($errors);
    		?>
    	<script type="text/javascript">
    		var app = {};
    		app.loginError = {{($errors->has('si_email') || $errors->has('si_password') || $errors->has('login'))?1:0}};
    		app.signupError = {{($errors->has('su_first_name') || $errors->has('su_last_name') ||$errors->has('su_email') ||$errors->has('su_password'))?1:0}};



    		
    	</script>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    	<script src="{{URL::to('js/app.js')}}"></script>
    </body>
</html>
