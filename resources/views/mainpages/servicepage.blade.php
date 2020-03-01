@extends('layout.master')

@push('css')
<style>

</style>
@endpush

@section("content")
<main>
	   <section id="hero_in" class="courses" style="background: url(@if(!empty($unid->unidetail->featured_img)){{url('/public/assets/universities/fimg')}}/{{$unid->unidetail->featured_img}} @endif)center center no-repeat;">
			<div class="wrapper" style="background-color: rgba(0, 0, 0, 0.25) !important;">
				
			</div>
		</section>
		<!--/hero_in-->

		<div class="bg_color_1">
			<nav class="secondary_nav sticky_horizontal">
				<div class="container">
					<ul class="clearfix">
						
					</ul>
				</div>
			</nav>
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="description">
							
							<!-- /box_highlight -->
							<h2>@if(!empty($countdetail)) {{$countdetail->name}} @endif {{$secdetail->name}}</h2>
							<br>
							@if(!empty($countdetail))
							<div class="row">
							<div class="col-sm-4"><img src="{{url('/public/assets/countries')}}/{{App\Country::getCountryFlag($countdetail->id)}}" style="max-width: 220px;" class="img img-circle"  alt=""></div>
							<div class="col-sm-8">@if(!empty($countdetail->CountryDetail->long_desc)){!! str_limit($countdetail->CountryDetail->long_desc,$limit = 150, $end = '...') !!}@endif<br>
							<a href="{{url('countries-uni/'.$countdetail->slug)}}" target="_blank">Read More</a>
							</div>
							<br>
							</div>
							<br>
							
							@endif
							
						
						
							
						</section>
						<br>
						@isset($secdetail->detail){!! $secdetail->detail !!}@endisset
						
						<br>
						@if(!empty($secdetail->scholarship))
						<h3>Scholarship Program</h3>
						{!! $secdetail->scholarship !!}
						@endif
						
			<div align="center">@if(!empty($secdetail->link1name) and !empty($secdetail->link1url))<a href="{{$secdetail->link1url}}" class="btn btn-primary ">{{$secdetail->link1name}}</a>@endif
	        @if(!empty($secdetail->link2name) and !empty($secdetail->link2url))<a href="{{$secdetail->link2url}}" class="btn btn-danger ">{{$secdetail->link2name}}</a>@endif</div>
	        
	        <br>
	
	@if(!empty($universties))
	<h3>Available Universites</h3>
<div class="row" style="padding:5px">
				@forelse($universties as $uni)
				<div class="col-lg-4 col-md-4 text-center" >
					<a href="{{url('/university/'.$uni->slug)}}">
						<img src="{{url('/public/assets/universities')}}/{{$uni->logo}}" style="max-width: 220px; padding: 15px;" class="img img-circle"  alt="">
					</a>
				</div>
				@empty
					@endforelse
				<!-- /grid_item -->
				
				<!-- /grid_item -->
			
			</div>
			@endif
					</div>
					<!-- /col -->
					
					@include("mainpages.sideform")
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
@endsection