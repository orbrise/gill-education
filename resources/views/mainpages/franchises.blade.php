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
			        <h3>Our Franchises</h3>
			        <hr>
			        @forelse($franchises as $fr)
<div class="box_list wow animated" style="visibility: visible;">
						<div class="row no-gutters">
							<div class="col-lg-5">
								<div class="simg" style="padding:6px; height:100%">
								<div class="mapouter">
								    <div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q={{$fr->baddress}}%20{{App\Country::getCountryNameByID($fr->country)}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
								    <style>.mapouter{text-align:right;height:100%;width:100%px;}.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
								    </div>
							</div>
							</div>
							<div class="col-lg-7">
								<div class="wrapper">
									
									<a href="program/furtwangen-university/master-of-biomedical-engineering-(bme)"><div class="price">{{$fr->bname}}</div></a>
									<small>{{ $fr->baddress}}, {{App\Country::getCountryNameByID($fr->country)}}</small>
									<h3>{{$fr->name}}</h3>
									
									<p> Email: {{$fr->email}}
										</p>

									
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