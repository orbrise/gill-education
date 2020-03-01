@extends('layout.master')

@section('content')

<main>
	<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp">{{$cid->name}}<span></span></h1>
				</div>
			</div>
	</section>
	<div class="container margin_120_95">
	    <div class="row">
	        <div class="col-sm-12">
	    <h2><img src="{{asset('public/assets/countries')}}/{{$cid->flag}}" class="img img-responsive" width="50"> {{$cid->name}}</h2>
		<hr>
	    @if(!empty($countryd->long_desc)){!! $countryd->long_desc !!}@endif
	    <br>
	    <div align="center">
	        @if(!empty($countryd->link1name) and !empty($countryd->link1url))<a href="{{$countryd->link1url}}" class="btn btn-primary ">{{$countryd->link1name}}</a>@endif
	        @if(!empty($countryd->link2name) and !empty($countryd->link2url))<a href="{{$countryd->link2url}}" class="btn btn-primary ">{{$countryd->link2name}}</a>@endif
	    </div>
	    <br><br>
		<h4>Available Universities in {{$cid->name}}</h4>
		<br>
<div class="row">
	

				@forelse($unis as $uni)
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
			</div>
			</div>
		</div>
</main>
@endsection