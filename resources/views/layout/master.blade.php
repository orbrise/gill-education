<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>Gill Education Consultant</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- BASE CSS -->
    <link href="{{ asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style.css')}}" rel="stylesheet">
	<link href="{{ asset('public/assets/css/vendors.css')}}" rel="stylesheet">
	<link href="{{ asset('public/assets/css/icon_fonts/css/all_icons.min.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('public/assets/css/custom.css')}}" rel="stylesheet">
    @stack('css')

</head>

<body>
		
	<div id="page">
		
	<header class="header menu_2">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
		<div id="logo">
			<a href="index.html"><img src="{{ asset('public/assets/img/logo.png')}}" width="149" height="42" data-retina="true" alt=""></a>
		</div>
		
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<nav id="menu" class="main-menu">
			<ul>
				<li><span><a href="{{url('/')}}">Home</a></span>
					
				</li>
				<li><span><a href="#0">Categories</a></span>
					<ul>
						@forelse($cats as $cat)
						<li><a href="{{url('/search?category='.$cat->id)}}">{{$cat->name}}</a></li>
						@empty
						@endforelse
						
					</ul>
				</li>
				<li><span><a href="{{url('/countries')}}">Countries</a></span>
				<ul>
				    @forelse($countries as $country)
				    <li><a href="{{url('/countries-uni/'.$country->slug)}}">{{$country->name}}</a></li>
				    @empty
				    @endforelse
				    <li><a href="{{url('countries')}}">All Countries</a></li>
				</ul>
				</li>
				<li><span><a href="{{url('/about')}}">About</a></span></li>
				<li><span><a href="#!">Services</a></span>
				<ul>
				    @forelse($services as $service)
				    @if($service->id== 10)
				    <li><a href="{{url('/services/'.$service->id.'/countries')}}">{{$service->name}}</a></li>
				    @else
				    <li><a href="{{url('/services/'.$service->id.'/countries')}}">{{$service->name}}</a></li>
				    @endif
				    @empty
				    @endforelse
				</ul>
				</li>
				<li><span><a href="{{url('/all-universities')}}">All Universites</a></span></li>
				<li><span><a href="{{url('/become-agent')}}">Agent</a></span></li>
				<li><span><a href="{{url('/partners')}}">Partners</a></span></li>
				<li><span><a href="{{url('/contact')}}">Contact</a></span></li>
			</ul>
		</nav>
		<!-- Search Menu -->
		<div class="search-overlay-menu">
			<span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
			<form role="search" id="searchform" method="get">
				<input value="" name="q" type="search" placeholder="Search..." />
				<button type="submit"><i class="icon_search"></i>
				</button>
			</form>
		</div><!-- End Search Menu -->
	</header>
	<!-- /header -->
	
	@yield('content')
	<!-- /main -->

	<footer>
		<div class="container margin_120_95">
			<div class="row">
				<div class="col-lg-5 col-md-12 p-r-5">
					<p><img src="{{asset('public/assets/img/logo.png')}}" width="149" height="42" data-retina="true" alt=""></p>
					<p>Our mission is straightforward: Enable students to find the right university or college in Europe. On every international student’s personal level, studying abroad is an amazing life-changing experience.</p>
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a href="https://www.facebook.com/Gilleducationconsultant/" target="_blank"><i class="ti-facebook"></i></a></li>
							<li><a href="mailto:info@gilleducationconsultant.com" target="_top"><i class="ti-email"></i></a></li>
							<li><a href="whatsapp://send?text=Dear Sir, i am interested to know more about on study abroad&phone=+923009360419"><i class="icon-phone-circled"></i></a></li>
							<!--<li><a href="#0"><i class="ti-pinterest"></i></a></li>
							<li><a href="#0"><i class="ti-instagram"></i></a></li>-->
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 ml-lg-auto">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('about')}}">About</a></li>
						<li><a href="{{url('/countries')}}">Countries</a></li>
						<li><a href="{{url('/partners')}}">Partners</a></li>
						<li><a href="{{url('/contact')}}">Contacts</a></li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://+92-300-9360419"><i class="ti-mobile"></i> +92-300-9360419</a></li>
						<li><a href="mailto:ikram@gilleducationconsultant.com"><i class="ti-email"></i> info@gilleducationconsultant.com</a></li>
						<li>Adress: Office # 135, Bilal Garden Town Head Rajkan Yazman, Distt.Bahawalpur, Pakistan</li>
					
					</ul>
					<!--<div id="newsletter">
					<h6>Newsletter</h6>
					<div id="message-newsletter"></div>
					<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
						<div class="form-group">
							<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
							<input type="submit" value="Submit" id="submit-newsletter">
						</div>
					</form>
					</div>-->
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<!--<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>-->
						<li><a href="{{ url('/partners')}}">Partners</a></li>
						<li><a href="{{ url('/franchises')}}">Our Franchises</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2019 Gill Education Consultant</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- COMMON SCRIPTS -->
    <script src="{{ asset('public/assets/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/common_scripts.js')}}"></script>
    <script src="{{ asset('public/assets/js/main.js')}}"></script>
	<script src="{{ asset('public/assets/assets/validate.js')}}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>