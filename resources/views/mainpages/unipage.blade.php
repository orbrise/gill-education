@extends('layout.master')

@push('css')
<style>

</style>
@endpush

@section("content")
<main>
		<section id="hero_in" class="courses" style="background: url(@isset($unid->unidetail->featured_img){{url('/public/assets/universities/fimg')}}/{{$unid->unidetail->featured_img}}@endisset) center center no-repeat;">
            @if(isset($unid->unidetail->featured_img)) <div class="wrapper" style="background-color: rgba(0, 0, 0, .1) !important;"> @else @endif
			
				
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
							<h2>{{$unid->name}}</h2>
							<p><strong>@isset($unid->unidetail->short_desc){{$unid->unidetail->short_desc}}@endisset</strong></p>
							@isset($unid->unidetail->long_desc){!! $unid->unidetail->long_desc !!}@endisset
							
							<!-- /row -->
							
							@if(!empty($unid->unidetail->video_url) && filter_var($unid->unidetail->video_url, FILTER_VALIDATE_URL)))
							<iframe width="420" style="height: 500px !important" 
src="{{$unid->unidetail->video_url}}">
</iframe>
							
						
						@endif
							

						</section>
						<!-- /section -->
						<br>
						<div align="center"><div class="col-sm-6 alert alert-info">List of selected courses are given below from {{$unid->name}}. We shall add more programs shortly.</div></div>
						<br>
						<section id="lessons">
							<div class="intro_title">
								<h2>Programme</h2>
							</div>
							<br>
							<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-bach" role="tab" aria-controls="nav-home" aria-selected="true">Bachelor</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Master</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">PHD</a>
    <a class="nav-item nav-link" id="nav-doubledegree-tab" data-toggle="tab" href="#nav-doubledegree" role="tab" aria-controls="nav-doubledegree" aria-selected="false">Double Degree Programs</a>
     <a class="nav-item nav-link" id="nav-onetier-tab" data-toggle="tab" href="#nav-onetier" role="tab" aria-controls="nav-phd" aria-selected="false">One-tier Master</a>
          <a class="nav-item nav-link" id="nav-nondegree-tab" data-toggle="tab" href="#nav-nondegree" role="tab" aria-controls="nav-phd" aria-selected="false">Non-Degree Program</a>
          <a class="nav-item nav-link" id="nav-langp-tab" data-toggle="tab" href="#nav-langp" role="tab" aria-controls="nav-phd" aria-selected="false">Language/Preparatory Course</a>
  </div>
  
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-bach" role="tabpanel" aria-labelledby="nav-home-tab">
  	<br>
  	@if(!empty($catsb))
  	@forelse($catsb as $key => $catb)
  	@php $pros = App\Program::getprog($catb->category,'Bachelor', $unid->id) @endphp
  	<div class="card">
									<div class="card-header" role="tab" id="heading{{$key}}">
										<h5 class="mb-0">
											<a data-toggle="collapse" href="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}"><i class="indicator ti-minus"></i> {{$catb->catname->name}}</a>
										</h5>
									</div>

									<div id="collapse{{$key}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$key}}">
										<div class="card-body">
											<div class="list_lessons_2">
												<ul>
												    
													@forelse($pros  as $pro)
													<li><a href="{{url('/program')}}/{{strtolower($unid->slug)}}/{{strtolower($pro->slug)}}">{{$pro->program_name}}</a></li>
													@empty
													@endforelse
												</ul>
											</div>
										</div>
									</div>
								</div>
  	@empty
  	data not available
  	@endforelse
  	@endforelse
  	<br>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  	<br>
  	@if(!empty($catsm))
  	@forelse($catsm as $key1 => $catm)
  	@php $prosm = App\Program::getprog($catm->category,'Master', $unid->id) @endphp
  	<div class="card">
									<div class="card-header" role="tab" id="heading{{$key1}}">
										<h5 class="mb-0">
											<a data-toggle="collapse" href="#collapse{{$key1}}" aria-expanded="false" aria-controls="collapse{{$key1}}"><i class="indicator ti-minus"></i> {{$catm->catname->name}}</a>
										</h5>
									</div>

									<div id="collapse{{$key1}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$key1}}">
										<div class="card-body">
											<div class="list_lessons_2">
												<ul>
													@forelse($prosm  as $pro)
													<li>{{$pro->program_name}}</li>
													@empty
													@endforelse
												</ul>
											</div>
										</div>
									</div>
								</div>
  	@empty
  	@endforelse
  	no programs avaialable
  	@endif
  	<br>
  	
  	<br>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  		<br>
  		@if(!empty($catsd))
  	@forelse($catsd as $key2 => $catd)
  	@php $prosd = App\Program::getprog($catd->category,'PhD', $unid->id) @endphp
  	<div class="card">
									<div class="card-header" role="tab" id="heading{{$key2}}">
										<h5 class="mb-0">
											<a data-toggle="collapse" href="#collapse{{$key2}}" aria-expanded="false" aria-controls="collapse{{$key2}}"><i class="indicator ti-minus"></i> {{$catd->catname->name}}</a>
										</h5>
									</div>

									<div id="collapse{{$key2}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$key2}}">
										<div class="card-body">
											<div class="list_lessons_2">
												<ul>
													@forelse($prosd  as $pro)
													<li>{{$pro->program_name}}</li>
													@empty
													No Programs Availabale
													@endforelse
												</ul>
											</div>
										</div>
									</div>
								</div>
  	@empty
  	No Programs Availabale
  	<br>
  	@endforelse
  	@endif
  	<br>

  </div>
  
  
  <div class="tab-pane fade" id="nav-doubledegree" role="tabpanel" aria-labelledby="nav-doubledegree-tab">
  		<br>
  		@if(!empty($ddeg))
  	@forelse($ddeg as $key3 => $ddg)
  	@php $prosdd = App\Program::getprog($ddg->category,'Double Degree Programs', $unid->id) @endphp
  	<div class="card">
									<div class="card-header" role="tab" id="heading{{$key3}}">
										<h5 class="mb-0">
											<a data-toggle="collapse" href="#collapse{{$key3}}" aria-expanded="false" aria-controls="collapse{{$key3}}"><i class="indicator ti-minus"></i> {{$ddg->catname->name}}</a>
										</h5>
									</div>

									<div id="collapse{{$key3}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$key3}}">
										<div class="card-body">
											<div class="list_lessons_2">
												<ul>
													@forelse($prosdd  as $proddg)
													<li>{{$proddg->program_name}}</li>
													@empty
													No Programs Availabale
													@endforelse
												</ul>
											</div>
										</div>
									</div>
								</div>
  	@empty
  	No Programs Availabale
  	<br>
  	@endforelse
  	@endif
  	<br>

  </div>
  
  <div class="tab-pane fade" id="nav-onetier" role="tabpanel" aria-labelledby="nav-onetier-tab">
  		<br>
  		@if(!empty($onet))
  	@forelse($onet as $key4 => $oneti)
  		@php $prosone = App\Program::getprog($oneti->category,'One-tier Master', $unid->id) @endphp
  	<div class="card">
									<div class="card-header" role="tab" id="heading{{$key4}}">
										<h5 class="mb-0">
											<a data-toggle="collapse" href="#collapse{{$key4}}" aria-expanded="false" aria-controls="collapse{{$key4}}"><i class="indicator ti-minus"></i> {{$oneti->catname->name}}</a>
										</h5>
									</div>

									<div id="collapse{{$key4}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$key4}}">
										<div class="card-body">
											<div class="list_lessons_2">
												<ul>
													@forelse($prosone  as $onetir)
													<li>{{$onetir->program_name}}</li>
													@empty
													No Programs Availabale
													@endforelse
												</ul>
											</div>
										</div>
									</div>
								</div>
  	@empty
  	No Programs Availabale
  	<br>
  	@endforelse
  	@endif
  	<br>

  </div>
  
    <div class="tab-pane fade" id="nav-nondegree" role="tabpanel" aria-labelledby="nav-nondegree-tab">
  		<br>
  		@if(!empty($ndg))
  	@forelse($ndg as $key5 => $nd)
  		@php $prosnd = App\Program::getprog($nd->category,'Non-Degree Program', $unid->id) @endphp
  	<div class="card">
									<div class="card-header" role="tab" id="heading{{$key5}}">
										<h5 class="mb-0">
											<a data-toggle="collapse" href="#collapse{{$key5}}" aria-expanded="false" aria-controls="collapse{{$key5}}"><i class="indicator ti-minus"></i> {{$nd->catname->name}}</a>
										</h5>
									</div>

									<div id="collapse{{$key5}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$key5}}">
										<div class="card-body">
											<div class="list_lessons_2">
												<ul>
													@forelse($prosnd as $ndp)
													<li>{{$ndp->program_name}}</li>
													@empty
													No Programs Availabale
													@endforelse
												</ul>
											</div>
										</div>
									</div>
								</div>
  	@empty
  	No Programs Availabale
  	<br>
  	@endforelse
  	@endif
  	<br>

  </div>
  
    <div class="tab-pane fade" id="nav-langp" role="tabpanel" aria-labelledby="nav-langp-tab">
  		<br>
  		@if(!empty($lngc))
  	@forelse($lngc as $key6 => $lang)
  	@php $prosln = App\Program::getprog($lang->category,'Language/Preparatory Course', $unid->id) @endphp
  	<div class="card">
									<div class="card-header" role="tab" id="heading{{$key6}}">
										<h5 class="mb-0">
											<a data-toggle="collapse" href="#collapse{{$key6}}" aria-expanded="false" aria-controls="collapse{{$key6}}"><i class="indicator ti-minus"></i> {{$lang->catname->name}}</a>
										</h5>
									</div>

									<div id="collapse{{$key6}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$key6}}">
										<div class="card-body">
											<div class="list_lessons_2">
												<ul>
													@forelse($prosln  as $ln)
													<li>{{$ln->program_name}}</li>
													@empty
													No Programs Availabale
													@endforelse
												</ul>
											</div>
										</div>
									</div>
								</div>
  	@empty
  	No Programs Availabale
  	<br>
  	@endforelse
  	@endif
  	<br>

  </div>
  
  
  
  
</div>






  

							<!-- /accordion -->
						</section>
						<!-- /section -->
					
						<!-- /section -->
						@if(!empty($unid->unidetail->ranking))
<h2>Ranking</h2>
{!! $unid->unidetail->ranking !!}
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