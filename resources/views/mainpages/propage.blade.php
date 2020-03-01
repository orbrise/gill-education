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
							@if(!empty($proinfo->prod))
							<!-- /box_highlight -->
							<h2>@if(!empty($proinfo->program_name)){{$proinfo->program_name}}@endif</h2>
							<h4>@isset($proinfo->prod->degree){{$proinfo->prod->degree}} at {{$proinfo->prod->university_name}}@endisset</h4>
							<br>
							<table class="table table-striped table-bordered">
								<tr>
									<td colspan="2"><b>Program Information</b></td>
								</tr>
						    <tr>
						    	<td width="30%">Degree:</td>
						    	<td>@isset($proinfo->prod->degree){{$proinfo->prod->degree}}@endisset</td>
						    </tr>
						    <tr>
						    	<td>Disciplines:</td>
						    	<td>@isset($proinfo->prod->discipline){{$proinfo->prod->discipline}}@endisset</td>
						    </tr>
						    <tr>
						    	<td>Duration</td>
						    	<td>@isset($proinfo->prod->duration){{$proinfo->prod->duration}}@endisset</td>
						    </tr>
						    <tr>
						    	<td>University's Website</td>
						    	<td>@isset($proinfo->prod->uni_web){{$proinfo->prod->uni_web}}@endisset</td>
						    </tr>
							</table>
							<br>
							<h2>Description</h2>
							<br>
							@isset($proinfo->prod->description){!! $proinfo->prod->description !!}@endisset
							
							@else
							<h2>@if(!empty($proinfo->program_name)){{$proinfo->program_name}}@endif</h2>
							<br>
							<h4 class="text-center">For more information please contact us directly, submit your regaring question, we will response you with in few hours.</h4>
							@endif
						</section>
						
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