@extends('layout.master')

@section('content')
<main>
		<section id="hero_in" class="contacts">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Agent Form</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<!--/contact_info-->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="row justify-content-between">
					
					<div class="col-lg-12">
						<h4>Become an Agent</h4>
						<p>Fill the given form below and become as an agent.</p>
						<div id="message-contact">
						@if ($errors->any())
							@foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
		@endforeach
@endif
@if(!empty(session('msg'))) <div class="alert alert-success">{{ session('msg')}}</div> @endif
						</div>
						<form method="post" action="{{url('becomeagent')}}">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="text" id="agent_name" name="agent_name" value="{{old('agent_name')}}" required>
										<label class="input_label">
											<span class="input__label-content">Agen Name</span>
										</label>
									</span>
								</div>
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="text" id="lastname_contact" name="company_name" value="{{old('company_name')}}"  required>
										<label class="input_label">
											<span class="input__label-content">Company Name</span>
										</label>
									</span>
								</div>
							</div>
							<!-- /row -->
							<div class="row">
								<div class="col-md-6">
									<span class="input">
										<select class="input_field" id="country" name="country" style="border-bottom:1px solid gray" required>
										
											<option class="input__label-content">Country Name</option>
										@foreach($allcots as $cot)
										<option value="{{$cot->name}}">{{$cot->name}}</option>
					
										@endforeach
										</select>
									</span>
								</div>
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="text" value="{{old('company_address')}}" id="company_address" name="company_address" required>
										<label class="input_label">
											<span class="input__label-content">Company Address</span>
										</label>
									</span>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<span class="input">
										<select class="input_field" id="country" name="interested_in" style="border-bottom:1px solid gray" required>
										
											<option class="input__label-content">Interested In</option>
										@foreach($sections as $section)
										<option value="{{$section->name}}">{{$section->name}}</option>
					
										@endforeach
										</select>
									</span>
								</div>
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="date" id="starting_year" name="starting_year" required>
										<label class="input_label">
											<span class="">Starting Year</span>
										</label>
									</span>
								</div>
							</div>
							
							<!-- /row -->
							<span class="input">
									<textarea class="input_field" id="message" name="message" style="height:150px;" required>{{old('message')}}</textarea>
									<label class="input_label">
										<span class="input__label-content">Your message</span>
									</label>
							</span>
							
							<p class="add_top_30"><input type="submit" value="Submit" class="btn_1 rounded"></p>
						</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
@endsection