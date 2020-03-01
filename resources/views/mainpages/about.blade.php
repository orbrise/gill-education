@extends('layout.master')

@section('content')

<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>About Gill Education Consultant</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_120_95">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Why choose Us</h2>
				<p></p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#">
						<i class="pe-7s-diamond"></i>
						<h3>Best support</h3>
						
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#">
						<i class="pe-7s-display2"></i>
						<h3>Quick responce</h3>
						
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#">
						<i class="pe-7s-science"></i>
						<h3>Advanced teaching</h3>
						
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#">
						<i class="pe-7s-rocket"></i>
						<h3>Adavanced study plans</h3>
						
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#">
						<i class="pe-7s-target"></i>
						<h3>Focus on target</h3>
						
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#">
						<i class="pe-7s-graph1"></i>
						<h3>focus on success</h3>
						
					</a>
				</div>
			</div>
			<!--/row-->
		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>About Us</h2>
					
				</div>
				<div class="row justify-content-between">
					{!! App\StaticPage::aboutus() !!}
				</div>
				<!--/row-->
			</div>
			<!--/container-->
		</div>
		
		<div class="container margin_120_95">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Our Team</h2>
			</div>
			<div id="carousel" class="owl-carousel owl-theme">
			    @forelse($teams as $team)
				<div class="item">
					<a href="#0">
						<div class="title">
							<h4>{{$team->name}}<em>{{$team->desig}}</em></h4>
						</div><img src="{{url('public/assets/profilepic')}}/{{$team->profilepic}}" alt="">
					</a>
				</div>
				@empty
				@endforelse
			
			</div>
			<!-- /carousel -->
		</div>
		<!--/bg_color_1-->

		
		<!--/container-->
	</main>

@endsection