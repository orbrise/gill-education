@extends('layout.master')

@section('content')
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
				<aside class="col-lg-4" id="sidebar">
					<div id="filters_col"> <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
						<div class="collapse show" id="collapseFilters">
							<div class="filter_type">
							<form method="get" action="{{url('/search')}}">
								{{csrf_field()}}
								<br>
											<select name="country" class="form-control">
												<option value="">Select Country</option>
												@forelse($cots as $cot)
												<option value="{{$cot->id}}" @if(!empty($_GET['country'])) @if($cot->id == $_GET['country']) selected @endif @endif>{{$cot->name}}</option>
												@empty
												@endforelse
											</select>
								<br>
								<select name="university" class="form-control">
									<option value="">Select University</option>
									@forelse($unis as $uni)
												<option value="{{$uni->id}}" @if(!empty($_GET['university'])) @if($uni->id == $_GET['university']) selected @endif @endif>{{$uni->name}}</option>
												@empty
												@endforelse
								</select>
								<br>
								<select name="category" class="form-control">
									<option value="">Select Category</option>
									@forelse($cats as $cat)
												<option value="{{$cat->id}}" @if(!empty($_GET['category'])) @if($cat->id == $_GET['category']) selected @endif @endif>{{$cat->name}}</option>
												@empty
												@endforelse
								</select>

								<br>
								<select name="type" class="form-control">
									<option value="">Select Type</option>
									@foreach($types as $type)
									<option value="{{$type->name}}" @if(!empty($_GET['type'])) @if($type->name == $_GET['type']) selected @endif @endif>{{$type->name}}</option>
									@endforeach
								</select>
								<br>
								<input type="text" name="proname" class="form-control" value="@if(!empty($_GET['proname'])){{$_GET['proname']}}@endif">
								<br>
								<input type="submit" class="btn btn-primary btn-blcok" value="Search">
							</form>
							</div>
							
						</div>
						<!--/collapse -->
					</div>
					<!--/filters col-->
				</aside>
				<!-- /aside -->

				<div class="col-lg-8" id="list_sidebar">
					@forelse($programs as $program)
					<div class="box_list wow">
						<div class="row no-gutters">
							<div class="col-lg-5">
								<div class="simg">
								<a href="{{ url('/university')}}/{{strtolower($program->uniimg->slug)}}"><img src="{{ asset('public/assets/universities')}}/{{$program->uniimg->logo}}" alt="" width="200"></a>
							</div>
							</div>
							<div class="col-lg-7">
								<div class="wrapper">
									
									<a href="{{'program'}}/{{strtolower($program->uniimg->slug)}}/{{strtolower($program->slug)}}"><div class="price">{{$program->program_name}}</div></a>
									<small>{{$program->catname->name}}</small>
									<a href="{{url('university/')}}/{{strtolower($program->uniimg->slug)}}" target="blank"><h3>{{$program->uniimg->name}}</h3></a>
									
									<p> {{$program->uniimg->city}}, {{$program->countrynamep->name}} <br> Duration 
										@if(!empty($program->prod->duration)){{$program->prod->duration}}@endif</p>

									
								</div>
								<ul>
									
									<li><a href="{{'program'}}/{{strtolower($program->uniimg->slug)}}/{{strtolower($program->slug)}}">Request Info</a></li>
								</ul>
							</div>
						</div>
					</div>
					@empty
					@endforelse
					<!-- /box_list -->
					
					<!-- /box_list -->
				
					<!-- /box_list -->
					
					<!-- /box_list -->
					
					<!-- /box_list -->
					<div class="float-right"> 
					{{$programs->appends(request()->input())->links("pagination::bootstrap-4")}}
				</div>
					
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-help2"></i>
							<h4>Need Help? Contact us</h4>
							<p>Cum appareat maiestatis interpretaris et, et sit.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-wallet"></i>
							<h4>Payments and Refunds</h4>
							<p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-note2"></i>
							<h4>Quality Standards</h4>
							<p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
						</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
@endsection