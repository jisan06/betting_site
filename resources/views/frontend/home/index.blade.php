@extends('frontend.layouts.master') 

@section('content')
	@include('frontend.home.element.slider')
	@include('frontend.home.element.live_match')
	@include('frontend.home.element.upcoming_match')
@endsection