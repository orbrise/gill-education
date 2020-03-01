@extends('layout.master')

@section('content')

<main>
	<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span></h1>
				</div>
			</div>
		</section>
	<div class="container margin_120_95">
		<h2>Available Countries</h2>
		<hr>
		
		<br>
<div class="row">
				@forelse($conts as $cot)
				<div class="col-lg-3 col-md-6 text-center" style="margin-bottom:20px" >
					<a href="{{url('services/'.$cot->id.'/countries/'.$cot->countries)}}">
					    @if(!empty($cot->countries))
						<img src="{{url('/public/assets/countries')}}/{{App\Country::getCountryFlag($cot->countries)}}" style="max-width: 220px;" class="img img-circle"  alt="">
							@endif
								<h5>{{App\Country::getCountryNameByID($cot->countries)}}</h5>
						
					</a>
				</div>
			
				@empty
					@endforelse
				<!-- /grid_item -->
				
				<!-- /grid_item -->
			</div>
		</div>
</main>
@endsection