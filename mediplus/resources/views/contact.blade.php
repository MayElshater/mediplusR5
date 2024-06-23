@extends('layouts.main')
@section('content')
		
		<!-- Breadcrumbs -->
		@include('includes.Breadcrumbs')
		<!-- End Breadcrumbs -->
				
		<!-- Start Contact Us -->
		@include('includes.Contact')
		<!--/ End Contact Us -->
		
		<!-- Footer Area -->
		
		<!--/ End Footer Area -->
		
		@section('footerjsmap') 		
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyDGqTyqoPIvYxhn_Sa7ZrK5bENUWhpCo0w"></script>
		<!-- Gmaps JS -->
		<script src="{{asset('assets/js/gmaps.min.js')}}"></script>
		<!-- Map Active JS -->
		<script src="{{asset('assets/js/map-active.js')}}"></script>

		@endsection
		@endsection    