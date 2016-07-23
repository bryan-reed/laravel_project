@extends('layouts.master')

@section('title')
	My Account | Rank My Doctor
@endsection

@section('content')
	<div class="row">
		@include('includes.navigation')
		<div class="main @if(Auth::check()) col-sm-10 @else col-sm-12 @endif">
        	<h1 class="page-header"></h1>
        	<div class="media">
				<div class="media-left">
					<img src="{{route('doctor.image', ['filename' => $doctor->image])}}" alt="{{$doctor->first_name}}" class="img-thumbnail media-object doc-pic" />
				</div>
			  <div class="media-body">
			    <h4 class="media-heading">{{$doctor->first_name.' '.$doctor->last_name}}</h4>
			    <p>{{$doctor->bio}}</p>
			  </div>
			</div>
			<hr />
			<div class="col-xs-9">

		        <div class="row">
		            <div class="col-xs-12"><h4>Reviews</h4></div>
		         </div>
		         @if(count($doctor->reviews) > 0)
		         	@foreach($doctor->reviews AS $review)
		         		<blockquote>
		         			<p>{{$review->rating}} Stars</p>
		         			<p>{{$review->review}}</p>
		         			<footer>{{$review->name.', '.date('F d, Y', strtotime($review->created_at))}}</footer>
		         		</blockquote>
		         	@endforeach
		         @else
		         	<p>No Reviews</p>
		         @endif
		        </div>
		        <div class="col-xs-9">
		            <form class="form-horizontal" name="reviewForm" method="post" action="{{route('submit.review')}}" >
		            	<input type="hidden" name="_token" value="{{ Session::token() }}" />
		            	<input type="hidden" name="doctor_id" value="{{$doctor->id}}" />
		                <div class="form-group">
		                    <label for="name" class="col-sm-2 control-label">Your Name</label>
		                    <div class="col-sm-10">
		                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name"required>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2 control-label">Number of Stars</label>
		                    <div class="col-sm-10">
		                    	<label class="radio-inline">
		                    		<input type="radio" name="rating" id="rating1" value="1"> 1
		                    	</label>
		                    	<label class="radio-inline">
		                    		<input type="radio" name="rating" id="rating2" value="2"> 2
		                    	</label>
		                    	<label class="radio-inline">
		                    		<input type="radio" name="rating" id="rating3" value="3"> 3
		                    	</label>
		                    	<label class="radio-inline">
		                    		<input type="radio" name="rating" id="rating4" value="4"> 4
		                    	</label>
		                    	<label class="radio-inline">
		                    		<input type="radio" name="rating" id="rating5" value="5"> 5
		                    	</label>
							</div>
		                </div>
		                <div class="form-group">
		                    <label for="review" class="col-sm-2 control-label">Your Comments</label>
		                    <div class="col-sm-10">
		                        <textarea class="form-control" id="review" name="review" rows="12" required></textarea>
		                        
		                    </div>
		                </div> 
		                <div class="form-group">
		                    <div class="col-sm-offset-2 col-sm-10">
		                        <button type="submit" class="btn btn-primary">Submit Review</button>
		                    </div>
		                </div>
		                
		            </form>
	        </div>
        </div>
	</div>
@endsection