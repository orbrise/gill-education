@extends('layout.master')



@section('content')
<style>
    .box_list {
   
    margin-bottom: 3px !important; 
     min-height: 246px !important; 
     margin-bottom:10px !important;
    }
</style>
<main>
		<section id="hero_in" class="courses">
			<div class="wrapper">
				<div class="container">
					
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="filters_listing sticky_horizontal">
			<div class="container">
				
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->

		<div class="container margin_60_35">
		   
			<div class="row">
			    
			    <div class="col-md-12 col-md-offset-2">
			        <h3>Our Partners</h3>
			        <hr>
			        @forelse($partners as $partner)
<div class="box_list wow animated" style="visibility: visible;">
						<div class="row no-gutters">
							<div class="col-lg-5">
								<div class="simg" style="padding:6px; height:100%">
								<div class="mapouter">
								    <div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q={{$partner->baddress}}%20{{App\Country::getCountryNameByID($partner->country)}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
								    <style>.mapouter{text-align:right;height:100%;width:100%px;}.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
								    </div>
							</div>
							</div>
							<div class="col-lg-7">
								<div class="wrapper">
									
									<a href="program/furtwangen-university/master-of-biomedical-engineering-(bme)"><div class="price">{{$partner->bname}}</div></a>
									<small>{{ $partner->baddress}}, {{App\Country::getCountryNameByID($partner->country)}}</small>
									<br><br>
									<div class="row">
									<div class="col-sm-12 col-md-2"><img src="{{url('public/assets/partners')}}/{{$partner->img}}" class="img" width="80"></div>
									<div class="col-sm-12 col-md-8">
									    <h3>{{$partner->name}}</h3>
									
									<p> Email: {{$partner->email}}<br>
										Address: {{$partner->baddress}} {{$partner->countryname->name}}</p>
</div>
									</div>
									
									
								</div>
								
							</div>
						</div>
					</div>
					@empty
					@endforelse
					</div>
					</div>
					</main>
@endsection