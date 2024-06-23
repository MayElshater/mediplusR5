@extends('layouts.main')
@section('content')
<!-- Slider Area -->
@include('includes.SliderArea')
		<!--/ End Slider Area -->
		
		<!-- Start Schedule Area -->
		@include('includes.scheduleArea')
		<!--/End Start schedule Area -->

		<!-- Start Feautes -->
		@include('includes.Feautes')
		<!--/ End Feautes -->
		
		<!-- Start Fun-facts -->
		@include('includes.Funfacts')
		<!--/ End Fun-facts -->
		
		<!-- Start Why choose -->
		@include('includes.Whychoose')
		<!--/ End Why choose -->
		
		<!-- Start Call to action -->
		@include('includes.Calltoaction')
		<!--/ End Call to action -->
		
		<!-- Start portfolio -->
		@include('includes.portfolio')
		<!--/ End portfolio -->
		
		<!-- Start service -->
		@include('includes.service')
		<!--/ End service -->
		
		<!-- Pricing Table -->
		@include('includes.PricingTable')	
		<!--/ End Pricing Table -->
		
		
		
		<!-- Start Blog Area -->
		@include('includes.BlogArea')
		<!-- End Blog Area -->
		
		<!-- Start clients -->
		@include('includes.clients')
		<!--/Ens clients -->
		
		<!-- Start Appointment -->
		@include('includes.Appointment')
		<!-- End Appointment -->
		
		<!-- Start Newsletter Area -->
		@include('includes.Newsletter')
		<!-- /End Newsletter Area -->

@endsection()