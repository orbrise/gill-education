<style>.error{color:red; font-size:10px;}</style>
<aside class="col-lg-4" id="sidebar">
						<div class="box_detail">
						    @if(!empty(session("msg"))) <div class="alert alert-warning">{{session("msg")}}</div>@endif
							<h4>Enquire now</h4>
							<p class="nopadding" style="text-align:justify">Welcome this form takes approximately 1 minute. Please fill this form we will contact with you ASAP.<br>
							<span style="color:red">Note: This form is for our services in education consultancy only. Please call +92-300-9360419</span></p>
							<div id="message-contact"></div>
							<br>
							<form method="post" action="{{url('/submitenq')}}">
							    {{csrf_field()}}
							    <span class="input">
							        <label class="">
										<span class="">Are you Interested In?</span>
										</label>
										<select class="form-control" name="interetedin">
										    <option value="">Select</option>
										    <option value="Study Abroad">Study Abroad</option>
										    <option value="Migration and Work">Migration & Work</option>
										    <option value="Business">Business</option>
										    <option value="Tourists">Tourists</option>
										    <option value="Business Visitor">Business Visitor</option>
										    <option value="Study Visitor">Study Visitor</option>
										    <option value="Haj or Ummrah">Haj or Ummrah</option>
										</select>
										@if(!empty($errors->first("interetedin")))<span class="error">{{$errors->first("interetedin")}}</span>@endif
										
								</span>
								<div class="row">
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<input class="input_field" type="text" value="{{old('fname')}}"  name="fname">
											<label class="input_label">
												<span class="input__label-content">Your Name</span>
											</label>
											@if(!empty($errors->first("fname")))<span class="error">{{$errors->first("fname")}}</span>@endif
										</span>
									</div>
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<input class="input_field" type="text" value="{{old('lname')}}"  name="lname">
											<label class="input_label">
												<span class="input__label-content">Last name</span>
											</label>
											@if(!empty($errors->first("lname")))<span class="error">{{$errors->first("lname")}}</span>@endif
										</span>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<input class="input_field" type="text"  name="dob" placeholder="" value="01-01-1990">
											<label class="input_label">
												<span class="input__label-content">Date of Birth</span>
											</label>
											@if(!empty($errors->first("dob")))<span class="error">{{$errors->first("dob")}}</span>@endif
										</span>
									</div>
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
										    <label class="">
												<span class="">Gender</span>
											</label><br>
											<input class="" type="radio"  name="gender" value="male"> Male
											<input class="" type="radio"  name="gender" value="female"> Female
											@if(!empty($errors->first("gender")))<span class="error">{{$errors->first("gender")}}</span>@endif
										</span>
									</div>
								</div>
								
								<!-- /row -->
								<div class="row">
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<input class="input_field" type="email" value="{{old('email')}}" name="email">
											<label class="input_label">
												<span class="input__label-content">Your email</span>
											</label>
											@if(!empty($errors->first("email")))<span class="error">{{$errors->first("email")}}</span>@endif
										</span>
									</div>
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<input class="input_field" type="number" value="{{old('phone')}}" name="phone">
											<label class="input_label">
												<span class="input__label-content">Your telephone</span>
											</label>
											@if(!empty($errors->first("phone")))<span class="error">{{$errors->first("phone")}}</span>@endif
										</span>
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-sm-12">
									
										    <lable>Social Number(Whatsapp/IMO/Viber)</lable>
										    <div class="col-sm-8"><input type="text" name="countrycode" class="form-control" placeholder="country code" ></div>
										    <div class="col-sm-12"><input type="text" value="{{old('socialnumber')}}" class="form-control" name="socialnumber" placeholder="phone number">
										    
										    
											
											
											@if(!empty($errors->first("socialnumber")))<span class="error">{{$errors->first("socialnumber")}}</span>@endif
										</span>
									</div>
									<div class="clearfix"></div>
									<div class="col-xl-12 col-lg-12 col-sm-12">
										<span class="input">
											<input class="input_field" type="text" value="{{old('city')}}" name="city">
											<label class="input_label">
												<span class="input__label-content">City</span>
											</label>
											@if(!empty($errors->first("city")))<span class="error">{{$errors->first("city")}}</span>@endif
										</span>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<input class="input_field" type="text" value="{{old('state')}}" name="state">
											<label class="input_label">
												<span class="input__label-content">State / Province</span>
											</label>
											@if(!empty($errors->first("state")))<span class="error">{{$errors->first("state")}}</span>@endif
										</span>
									</div>
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<input class="input_field" type="text"  value="{{old('country')}}" name="country">
											<label class="input_label">
												<span class="input__label-content">Country</span>
											</label>
											@if(!empty($errors->first("country")))<span class="error">{{$errors->first("country")}}</span>@endif
										</span>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<label class="">
												<span class="">Have you prepared english language test (IELTS)?</span>
											</label><br>
											<input class="" type="radio"  name="langtest" value="yes"> Yes
											<input class="" type="radio"  name="langtest" value="no"> No
											@if(!empty($errors->first("langtest")))<span class="error">{{$errors->first("langtest")}}</span>@endif
										</span>
									</div>
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<label class="">
												<span class="">Marital Status</span>
											</label><br>
											<input class="" type="radio"  name="material" value="single"> Single
											<input class="" type="radio"  name="material" value="married"> Married
											@if(!empty($errors->first("material")))<span class="error">{{$errors->first("material")}}</span>@endif
										</span>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<label class="">
												<span class="">Desire Country</span>
											</label><br>
											<select class="form-control" name="desirecountry">
											   <option value="">Select</option>
											    @forelse($allcots as $country)
										    <option value="{{$country->name}}">{{$country->name}}</option>
										    @empty
										    @endforelse
										    
										</select>
										@if(!empty($errors->first("desirecountry")))<span class="error">{{$errors->first("desirecountry")}}</span>@endif
										</span>
									</div>
									<div class="col-xl-6 col-lg-12 col-sm-6">
										<span class="input">
											<input class="input_field" type="text" value="{{old('desirecourse')}}" name="desirecourse">
											<label class="input_label">
												<span class="input__label-content">Desire Course</span>
											</label>
											@if(!empty($errors->first("desirecourse")))<span class="error">{{$errors->first("desirecourse")}}</span>@endif
										</span>
									</div>
								</div>
								
								
								<span class="input">
										<textarea class="input_field" id="message_contact" name="message_contact" style="height:120px;" value="{{old('message_contact')}}"></textarea>
										<label class="input_label">
											<span class="input__label-content">Your message</span>
										</label>
										@if(!empty($errors->first("message_contact")))<span class="error">{{$errors->first("message_contact")}}</span>@endif
								</span>
								<span class="input">
										<input class="input_field" type="text" id="verify_contact" name="verify_contact">
										<label class="input_label">
										<span class="input__label-content">Are you human? 3 + 1 =</span>
										</label>
										@if(!empty($errors->first("verify_contact")))<span class="error">{{$errors->first("verify_contact")}}</span>@endif
								</span>
								<hr>
								<div style="position:relative;"><input type="submit" value="Enquire Now" class="btn_1 full-width" id="submit-contact"></div>
							</form>
							</div>
					</aside>