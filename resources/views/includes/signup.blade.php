<div id="signupModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Sign Up </h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" action="{{route('signup')}}" method="post">
					<input type="hidden" name="_token" value="{{ Session::token() }}" />
					<div class="form-group @if ($errors->has('su_first_name') || $errors->has('su_last_name')) has-error @endif">
	                    <div class="col-sm-6">
	                    	<input type="text" class="form-control" id="first_name" name="su_first_name" placeholder="First Name" value="{{Request::old('su_first_name')}}">
	                    	@if($errors->has('su_first_name'))<span class="help-block">First name is required</span>@endif
	                    </div>
	                    <div class="col-sm-6">
	                    	<input type="text" class="form-control" id="last_name" name="su_last_name" placeholder="Last Name" value="{{Request::old('su_last_name')}}">
	                    	@if($errors->has('su_last_name'))<span class="help-block">Last name is required</span>@endif
	                    </div>
	                </div>
	                <div class="form-group @if ($errors->has('su_email')) has-error @endif">
	                    <div class="col-sm-12">
	                    	<input type="text" class="form-control" id="email" name="su_email" placeholder="E-Mail" value="{{Request::old('su_email')}}">
	                    	@if($errors->has('su_email'))<span class="help-block">Email is required</span>@endif
	                    </div>
	                </div>
	                <div class="form-group @if ($errors->has('su_password')) has-error @endif">
	                    <div class="col-sm-12">
	                    	<input type="password" class="form-control" id="password" name="su_password" placeholder="Password">
	                    	@if($errors->has('su_password'))<span class="help-block">Password is required</span>@endif
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="col-sm-12">
	                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="col-sm-12">
	                        <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal">Cancel</button>
	                    </div>
	                </div>
	            </form>
			</div>
			<div class="modal-footer">
				<p>Already have an account? <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" data-toggle="modal" data-target="#signinModal">Sign In!</button></p>
			</div>
		</div>
	</div>
</div>