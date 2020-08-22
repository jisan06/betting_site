@extends('frontend.layouts.master') 

@section('content')
	@include('frontend.home.element.slider')
	@include('frontend.home.element.live_match')
	@include('frontend.home.element.upcoming_match')
@endsection

@section('custom_js')
	@if(Session::get('success_registration'))
	    <script type="text/javascript">
	        $(document).ready(function() {
	            Swal.fire({
	              position: 'top-end',
	              text: '{{Session::get('success_registration')}}',
	              showConfirmButton: false,
	              timer: 2500
	            });
	        });

	    </script>
	    <?php Session::forget('success_registration'); ?>
	@endif

	@if(Session::get('success_login'))
	    <script type="text/javascript">
	        $(document).ready(function() {
	            Swal.fire({
	              position: 'top-end',
	              text: '{{Session::get('success_login')}}',
	              showConfirmButton: false,
	              timer: 2500
	            });
	        });

	    </script>
	    <?php Session::forget('success_login'); ?>
	@endif
@endsection