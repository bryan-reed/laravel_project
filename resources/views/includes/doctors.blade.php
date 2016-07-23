@extends('layouts.master')

@section('title')
	My Doctors | Rank My Doctor
@endsection

@section('content')
	<div class="row">
		@include('includes.navigation')
		<div class="main @if(Auth::check()) col-sm-10 @else col-sm-12 @endif">
        	<h1 class="page-header">Doctors</h1>
        	@include('includes.doclist')
        </div>
	</div>
@endsection