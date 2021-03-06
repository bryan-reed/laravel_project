@extends('layouts.master')

@section('title')
	Rank My Doctor
@endsection

@section('content')
	<div class="row">
		@include('includes.navigation')
        <div class="main @if(Auth::check()) col-sm-10 @else col-sm-12 @endif">
        	@include('includes.doclist')
        </div>
    </div>
@endsection