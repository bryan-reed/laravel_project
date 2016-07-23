
	@if(Request::route()->getName() != 'doctors')
		<div class="row bottom_buffer">
	    	<div class="col-xs-6"><h1>Doctors</h1></div>
	            <div class="col-xs-6">
	              <form class="form-inline search-form" method="get" action="{{route('doctor.search')}}">
	                <div class="form-group">
	                	<label for="doctorSearch" class="sr-only">Search By Name</label>
	                	<input type="text" class="form-control" placeholder="Search by name" name="name" id="doctorSearch" value="{{Request::get('name')}}" />
	                </div>
	                <div class="form-group">
	                	<button type="submit" class="btn btn-primary btn-md btn-block">Search</button>
	                </div>
	            </form>
	        </div>
	    </div>
    @endif
@if(count($doctors))
	<div class="row">
		<ul class="media-list">
			@foreach($doctors AS $doctor)
	                <li class="media">
	                    <div class="media-left media-middle">
	                        <a href="{{route($route, ['id' => $doctor->id])}}">
	                            <img src="{{route('doctor.image', ['filename' => $doctor->image])}}" alt="{{$doctor->first_name}}" class="img-thumbnail media-object doc-pic" />
	                        </a>
	                    </div>
	                    <div class="media-body">
	                        <h2 class="media-heading">{{$doctor->first_name.' '.$doctor->last_name}}</h2>
	                        @if($doctor->reviews()->count() > 0)
	                        	<span class="badge">{{number_format($doctor->reviews()->avg('rating'), 1) + 0}} / 5 Stars</span>
	                        @endif
	                        <p>{{$doctor->bio}}</p>
	                    </div>
	                </li>
			@endforeach
		</ul>
	</div>
@else
	<p> No results found.</p>
@endif		