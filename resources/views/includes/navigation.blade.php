@if(Auth::check())
    <div class="col-sm-2 sidebar">
      <ul class="nav nav-sidebar">
      	<?php
      	$requestName = Request::route()->getName();
      	?>
        <li @if($requestName == 'home') class="active" @endif ><a href="{{route('home')}}">Home <span class="sr-only">(current)</span></a></li>
        <li @if($requestName == 'account') class="active" @endif><a href="{{route('account')}}">My Account</a></li>
        <li @if($requestName == 'doctors') class="active" @endif><a href="{{route('doctors')}}">My Doctors</a></li>
        <li @if($requestName == 'doctor.manage') class="active" @endif><a href="{{route('doctor.manage')}}">Manage Doctor</a></li>
      </ul>
    </div>
@endif