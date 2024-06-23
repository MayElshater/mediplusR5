<!doctype html>
<html class="no-js" lang="zxx">
    <head>
       @include('includes.head')		
    </head>
    <body>
	
		<!-- Preloader -->
        @include('includes.Preloader')
        <!-- End Preloader -->
		
		<!-- Get Pro Button -->
		@include('includes.ProButton')
	
		<!-- Header Area -->
		@include('includes.HeaderArea')
		<!-- End Header Area -->
		
		@yield('content')
		
		<!-- Footer Area -->
		@include('includes.Footer')
		<!--/ End Footer Area -->
		@include('includes.footerjs')
    </body>
</html>