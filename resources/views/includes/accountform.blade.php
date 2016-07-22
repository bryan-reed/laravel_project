@extends('layouts.master')

@section('title')
	My Account | Rank My Doctor
@endsection

@section('content')
	<div class="row">
		@include('includes.navigation')
		<div class="main @if(Auth::check()) col-sm-10 @else col-sm-12 @endif">
        	<h1 class="page-header">My Account</h1>
        	@if(Session::has('success'))
        		<p class="alert alert-success">{{Session::get('success')}}</p>
        	@endif
        	<form class="form-horizontal" action="{{route('account.update')}}" method="post">
        		<input type="hidden" name="_token" value="{{ Session::token() }}" />
				<div class="form-group row">
					<label for="first_name" class="col-sm-1 control-label">First name</label>
				    <div class="col-sm-5">
				    	<input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="{{Auth::user()->first_name}}">
					</div>
				</div>
				<div class="form-group row">
					<label for="last_name" class="col-sm-1 control-label">Last name</label>
				    <div class="col-sm-5">
				    	<input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name"  value="{{Auth::user()->last_name}}">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-1 control-label">Email</label>
				    <div class="col-sm-5">
				    	<input type="text" class="form-control" id="email" placeholder="Email" name="email"  value="{{Auth::user()->email}}">
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-1 control-label">Password</label>
				    <div class="col-sm-5">
				    	<input type="password" class="form-control" id="password" name="password"  placeholder="Password">
					</div>
				</div>
				
				  <div class="form-group">
				    <div class="col-sm-offset-1 col-sm-5">
				      <button type="submit" class="btn btn-primary">Save</button>
				    </div>
				  </div>
				</form>
			
        </div>
	</div>
@endsection