@extends('admin.layout.master')

@section('content')
<div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Countries</li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Countries Management</h4>
             </div>

             <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Manage Countries</h5>
                            @if(!empty(session('successmsg')))
                            <div class="alert alert-success">{{session('successmsg')}}</div>
                            @endif
                            <div class="row">
                            	<form method="post" action="{{ url('/admin/addcountry')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control mt-15" placeholder="write country name">
                                            
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control mt-15" name="flag">
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Add New Country">
                                </div>
                            </form>
                            </div>
                        </section>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">All Countries</h5>
                           
                            <div class="row">
                            	@forelse($allc as $c)
                            	<form method="post" action="{{ url('/admin/updatecountry')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                            		<input type="hidden" name="id" value="{{$c->id}}">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" name="name" value="{{$c->name}}" class="form-control mt-15" placeholder="write country name">
                                            
                                            
                                        </div>
                                        <div class="col-md-2">
                                        	<img src="{{url('public/assets/countries')}}/{{$c->flag}}" class="mt-15" width="80">
                                            
                                        </div>
                                        <div class="col-md-2"><input type="file" class="form-control mt-15" name="flag"></div>
                                        <div class="col-md-2"><input type="submit" class="btn btn-primary mt-15 btn-sm" value="Update Country"></div>
                                        @if($c->delstatus == 1)
                                        <div class="col-md-2"><a href="{{url('admin/deactivatecountry')}}/{{$c->id}}" class="btn btn-success mt-15 btn-sm">Deactivate</a></div>
                                        @else
                                         <div class="col-md-2"><a href="{{url('admin/activatecountry')}}/{{$c->id}}" class="btn btn-danger mt-15 btn-sm">Activate</a></div>
                                        @endif
                                        <div class="col-md-2">
                                        <a href="{{ url('admin/countrydetail/')}}/{{$c->id}}" class="btn btn-info mt-15 btn-sm">Country Details</a>
                                        
</div>
                                    </div>
                                    <br>
                                </div>
                            </form>
                            @empty

                            @endforelse
                            </div>
                        </section>
                    </div>
                </div>


      </div>
 </div>
@endsection