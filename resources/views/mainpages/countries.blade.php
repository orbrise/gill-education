@extends('layout.master')

@section('content')

<main>
	<section id="hero_in" class="general">
			<div class="wrapper">
				
			</div>
		</section>
	<div class="container margin_120_95">
		<h2>Available Countries</h2>
		<hr>
		
		<br>
<div class="row">
	

				@forelse($cots as $cot)
				<div class="col-lg-3 col-md-6 text-center" style="margin-bottom:20px">
					<a href="{{url('/countries-uni')}}/{{str_replace(' ', '-', strtolower($cot->name))}}">
						<img src="{{url('/public/assets/countries')}}/{{$cot->flag}}" style="max-width: 220px;" class="img img-circle"  alt="">
							
								<h5>{{$cot->name}}</h5>
							
						
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