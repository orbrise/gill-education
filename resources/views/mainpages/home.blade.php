@extends('layout.master')

@push('css')
<style>
ul.disciplines-container {
    display: flex;
    align-items: stretch;
    align-content: stretch;
    flex-wrap: wrap;
    padding: 0;
}

ul.disciplines-container li.discipline {
    flex: 1 0 20%;
    max-width: 20%;
    background-color: #eee;
    border: 1px solid #fff;
    padding: 0;
    text-align: center;
    list-style: none;
}

ul.disciplines-container li.discipline a {
    margin: 0;
    padding: 1.2em 0.8em;
    display: block;
    width: 100%;
    height: 100%;
    text-decoration: none;
    color: #000;
}

ul.disciplines-container li.discipline a img {
    height: 3.5em;
}

ul.disciplines-container li.discipline :hover {
    background-color: #ddd;
}

select.form-control:not([size]):not([multiple]) {
    height: calc(3.25rem + 2px) !important;
}
	@media screen and (max-device-width: 799px), screen and (max-width: 799px) {
ul.disciplines-container li.discipline {
    flex: 1 0 50% !important;
    max-width: 50% !important;
}
}
</style>
@endpush


@section('content')
<main>
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3>What would you learn?</h3>
					<p>Increase your expertise in business, technology and personal development</p>
					<form method="get" action="{{url('/search')}}">
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" class=" search-query" name="proname" placeholder="Ex. Architecture, Specialization...">
								<input type="submit" class="btn_search" value="Search">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- /hero_single -->

		<div class="features clearfix">
			<div class="container">
				<ul>
					<li><i class="pe-7s-study"></i>
						<h4>+200 courses</h4><span>Explore a variety of fresh topics</span>
					</li>
					<li><i class="pe-7s-cup"></i>
						<h4>Expert teachers</h4><span>Find the right instructor for you</span>
					</li>
					<li><i class="pe-7s-target"></i>
						<h4>Focus on target</h4><span>Increase your personal expertise</span>
					</li>
				</ul>
			</div>
		</div>
		<!-- /features -->

		<div class="container margin_30_95">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Udema Categories Courses</h2>
			</div>
			
			<div class="row">
				@forelse($cats as $cat)
				<div class="col-lg-3 col-md-3 col-xs-6 wow" data-wow-offset="150">
					<a href="{{url('/search?category='.$cat->id)}}" class="grid_item">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="{{$cat->icon}}" class="img-fluid" alt="">
							<div class="info">
							
								<h3>{{$cat->name}}</h3>
							</div>
						</figure>
					</a>
				</div>
       <!-- <li class="discipline">
          <a href="{{url('/search?category='.$cat->id)}}">
            <p>
              <img class="discipline-icon" alt="{{$cat->name}}" src="{{$cat->icon}}">
            </p>
            {{$cat->name}}
</a>        
</li>-->
@empty
@endforelse
      </div>
			<!-- /row -->
		</div>

		<div class="container-fluid margin_120_0">


			<div class="main_title_2">
				<span><em></em></span>
				<h2>Popular Universities</h2>
				<p>Here are some worlds best ranking universities</p>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				@forelse($unis as $uni)
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="{{url('/university')}}/{{$uni->slug}}">
								<div class="preview"><span>Read More</span></div><img src="{{url('/public/assets/universities')}}/{{$uni->logo}}" class="img-fluid" alt=""></a>
						</figure>
						<div class="wrapper">
							<small></small>
							<h3>{{$uni->name}}</h3>
							<p>@if(!empty($uni->unidetail->short_desc)){{ str_limit($uni->unidetail->short_desc, $limit = 150, $end = '...')}}@endif</p>
							
						</div>
						<ul>
							<li>Programs: {{count($uni->countpro)}}</li>
							<li><a href="{{url('/university')}}/{{$uni->slug}}">Read More</a></li>
						</ul>
					</div>
				</div>
				@empty
				@endforelse
			
			</div>
			<!-- /carousel -->
			<div class="container">
				<p class="btn_home_align"><a href="{{ url('all-universities')}}" class="btn_1 rounded">View all Universities</a></p>
			</div>
			<!-- /container -->
			
		</div>
		<!-- /container -->

	
		<!-- /container -->
<div class="container margin_30_95">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Featured Countries</h2>
					<p>Best countries who providing top class education</p>
			</div>
			<div class="row">
				@forelse($cots as $cot)
				<div class="col-lg-4 col-md-6">
					<a href="{{url('/countries-uni')}}/{{str_replace(' ', '-', strtolower($cot->name))}}" class="grid_item">
						<div style="max-width: 300px; max-height: 200px;">
						<img src="{{url('/public/assets/countries')}}/{{$cot->flag}}"  alt="">
					</div>
							
								<small> Programmes {{count($cot->CountUnis)}}</small>
								<h3>{{$cot->name}}</h3>
							
						
					</a>
				</div>
				@empty
					@endforelse
				<!-- /grid_item -->
				
				<!-- /grid_item -->
			</div>
			<!-- /row -->
		</div>
		
		<!-- /bg_color_1 -->

		<div class="call_section">
			<div class="container clearfix">
				<div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
					<div class="block-reveal">
						<div class="block-vertical"></div>
						<div class="box_1">
							<h3>Request Information</h3><br>
							<input type="text" class="form-control" placeholder="First Name"><br>
							<input type="text" class="form-control" placeholder="Email"><br>
							<textarea class="form-control">Your Message</textarea><br>
							<a href="#0" class="btn_1 rounded">Submit</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/call_section-->
	</main>
@endsection

@push('js')

@endpush