<div id="signinModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Login </h4>
			</div>
			<div class="modal-body">
				@if($errors->has('login'))<div class="alert alert-danger" role="alert">Login failed! Please try again.</div>@endif
				<form class="form-horizontal" role="form" action="{{ route('signin')}}" method="post">
					<input type="hidden" name="_token" value="{{ Session::token() }}" />
	                <div class="form-group @if ($errors->has('si_email')) has-error @endif">
	                    <div class="col-sm-12">
	                    	<input type="text" class="form-control" id="email" name="si_email" placeholder="E-Mail" value="{{Request::old('si_email')}}">
	                    	@if($errors->has('si_email'))<span class="help-block">Please enter a valid email address</span>@endif
	                    </div>
	                </div>
	                <div class="form-group @if ($errors->has('si_password')) has-error @endif">
	                    <div class="col-sm-12">
	                    	<input type="password" class="form-control" id="password" name="si_password" placeholder="Password">
	                    	@if($errors->has('si_password'))<span class="help-block">Password is required</span>@endif
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="col-sm-12">
	                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
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
				<p>Don't have an account? <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Sign Up!</button></p>
			</div>
		</div>
	</div>
</div>