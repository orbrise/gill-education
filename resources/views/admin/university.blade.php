@extends('admin.layout.master')

@section('content')
<div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Universities</li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Universites Management</h4>
             </div>

             <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Manage Universities
                            </h5>
                            @if(!empty(session('successmsg')))
                            <div class="alert alert-success">{{session('successmsg')}}</div>
                            @endif
                            <div class="row">
                            	<form method="post" action="{{ url('/admin/adduni')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control mt-15" placeholder="write university name">
                                            
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control custom-select" name="country">
                                                <option selected>Select Country</option>
                                                @forelse($allc as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @empty
                                                @endforelse
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control mt-15" name="city" placeholder="write city">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="file" class="form-control mt-15" name="logo">
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Add New University">
                                </div>
                            </form>
                            </div>
                        </section>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">All Universities</h5>
                            <form method="get" action="{{url('/admin/universities')}}">
                            <div class="row">
                            <div class="col-md-4">
                                            <select class="form-control custom-select" name="country">
                                                <option selected>Select Country</option>
                                                @forelse($allc as $c)
                                                <option value="{{$c->id}}" @if(!empty($_GET['country'])) @if($c->id == $_GET['country']) selected @endif @endif>{{$c->name}}</option>
                                                @empty
                                                @endforelse
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" value="Search" class="btn btn-primary btn-sm">
                                        </div>
                                    </div>
                                </form>


                           @if(!empty($unis))
                            <div class="row">
                            	@forelse($unis as $u)
                            	<form method="post" action="{{ url('/admin/updateuni')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                            		<input type="hidden" name="id" value="{{$u->id}}">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="name" value="{{$u->name}}" class="form-control mt-15" placeholder="write country name">
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control custom-select mt-15" name="country">
                                                <option selected>Select Country</option>
                                                @forelse($allc as $c)
                                                <option value="{{$c->id}}" @if($u->countryname->id == $c->id) selected @endif>{{$c->name}}</option>
                                                @empty
                                                @endforelse 
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="text" name="city" value="{{$u->city}}" class="form-control mt-15" placeholder="write country name">
                                        </div>
                                        <div class="col-md-3">
                                        	<img src="{{url('public/assets/universities')}}/{{$u->logo}}" class="mt-15" width="80">
                                            
                                        </div>
                                        <div class="col-md-3"><input type="file" class="form-control mt-15" name="logo"></div>
                                        <div class="col-md-2"><input type="submit" class="btn btn-primary mt-15 btn-sm" value="Update University"></div>
                                            <div class="col-md-4 mt-15"><a href="{{url('/admin/details/')}}/{{$u->slug}}" class="btn btn-info btn-sm">University Details</a>
                                            <a href="@if($u->delstatus == 1) {{url('admin/deactivate-uni/'.$u->id)}} @else {{url('admin/activate-uni/'.$u->id)}} @endif" class="btn @if($u->delstatus == 1) btn-success @else btn-danger @endif btn-sm">
                                                @if($u->delstatus == 1) Deactivate @else Activate @endif
                                            </a>
                                            </div>
                                            

                                      </div>
                                    </div>
                                    <br>
                                
                            </form>
                            <hr>
                            @empty

                            @endforelse
                            
                            </div>
                            @endif
                        </section>
                    </div>
                </div>


      </div>
 </div>
@endsection