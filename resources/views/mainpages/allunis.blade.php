@extends('layout.master')

@section('content')

<main>
	<section id="hero_in" class="general">
			<div class="wrapper">
				
			</div>
		</section>
	<div class="container margin_120_95">
		<h2>Available Universites</h2>
		<hr>
		
		<br>
<div class="row">
	

				@forelse($unis as $uni)
				<div class="col-lg-3 col-md-6 text-center" style="margin-bottom:20px">
					<a href="{{url('/university')}}/{{$uni->slug}}">
						<img src="{{url('/public/assets/universities')}}/{{$uni->logo}}" class="img-fluid" alt="">
							
								<h5>{{$uni->name}}</h5>
							
						
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