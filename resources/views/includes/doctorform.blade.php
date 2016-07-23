@extends('layouts.master')

@section('title')
	@if($mode == 'edit')Edit @else Add a @endif Doctor | Rank My Doctor
@endsection

@section('content')
	<div class="row">
		@include('includes.navigation')
		<div class="main @if(Auth::check()) col-sm-10 @else col-sm-12 @endif">
        	<h1 class="page-header">@if($mode == 'edit')Edit @else Add a @endif Doctor</h1>
        	@if(Session::has('success'))
        		<p class="alert alert-success">{{Session::get('success')}}</p>
        	@endif
        	<form class="form-horizontal" action="{{route('doctor.save')}}" method="post" enctype="multipart/form-data">
        		<input type="hidden" name="_token" value="{{ Session::token() }}" />
        		<input type="hidden" name="doctor_id" value="{{$doctor->id}}" />
				<div class="form-group row">
					<label for="first_name" class="col-sm-1 control-label">First name</label>
				    <div class="col-sm-5">
				    	<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{$doctor->first_name}}">
					</div>
				</div>
				<div class="form-group row">
					<label for="last_name" class="col-sm-1 control-label">Last name</label>
				    <div class="col-sm-5">
				    	<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{$doctor->last_name}}">
					</div>
				</div>
				<div class="form-group row">
				    <label for="doctor_image" class="col-sm-1 control-label">Image</label>
				    <div class="col-sm-2">
				    	<input type="file" id="doctor_image" name="image">
					</div>
					<div class="col-sm-9">
						@if(Storage::disk('local')->has($doctor->image))
							<img src="{{route('doctor.image', ['filename' => $doctor->image])}}" alt="" class="img-thumbnail" />
						@endif
					</div>
				</div>
				  
				<div class="form-group row">
				  	<label for="bio" class="col-sm-1 control-label">Bio</label>
				  	<div class="col-sm-5">
						<textarea class="form-control" rows="3" name="bio">{{$doctor->bio}}</textarea>
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