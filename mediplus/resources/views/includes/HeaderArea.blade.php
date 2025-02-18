<header class="header" >
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-5 col-12">
							<!-- Contact -->
							<ul class="top-link">
								<li><a href="#">{{__('messages.about')}}</a></li>
								<li><a href="#">{{__('messages.doctors')}}</a></li>
								<li><a href="#">{{__('messages.contact')}}</a></li>
								<li><a href="#">{{__('messages.FAQ')}}</a></li>
							</ul>
							<!-- End Contact -->
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">
								<li><i class="fa fa-phone"></i>+880 1234 56789</li>
								<li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
							</ul>
							<!-- End Top Contact -->
						</div>
						<li class="language-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-globe"></i> {{__('messages.language')}} <i class="icofont-rounded-down"></i>
                         </a>
                       <ul class="dropdown-menu">
                             <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}"><i class="flag-icon flag-icon-gb"></i> {{__('messages.english')}}</a></li>
                            <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"><i class="flag-icon flag-icon-sa"></i> {{__('messages.arabic')}}</a></li>
                        </ul>
                      </li>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.html"><img src="{{asset('assets/img/logo.png') }}" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="{{ request()->is('home') ? 'active' : '' }}"><a href="{{route('home')}}">{{__('messages.home')}} <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="index.html">{{__('messages.home_page1')}}</a></li>
												</ul>
											</li>
											<li class="{{ request()->is('doctors') ? 'active' : '' }}"><a href="{{route('doctors')}}">{{__('messages.doctors')}} </a></li>
											<li class="{{ request()->is('services') ? 'active' : '' }}"><a href="{{route('services')}}">{{__('messages.services')}} </a></li>
											<li class="{{ request()->is('pages') ? 'active' : '' }}"><a href="{{route('pages')}}">{{__('messages.pages')}} <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="{{route('error')}}">{{__('messages.404_error')}}</a></li>
												</ul>
											</li>
											<li class="{{ request()->is('blog') ? 'active' : '' }}"><a href="#">{{__('messages.Blogs')}} <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li class="{{ request()->is('blog') ? 'active' : '' }}"><a href="{{route('blog')}}">{{__('messages.Blogs_details')}} </a></li>
												</ul>
											</li>
											<li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">{{__('messages.contact_us')}}</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-12">
								<div class="get-quote">
									<a href="appointment.html" class="btn">{{__('messages.book_appointment')}}</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>