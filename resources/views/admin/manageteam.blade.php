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
                            	<form method="post" action="{{ url('/admin/addteam')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="name" class="form-control mt-15" placeholder="write name">
                                            
                                            
                                        </div>
                                         <div class="col-md-4">
                                            <input type="text" name="desig" class="form-control mt-15" placeholder="write designation">
                                            
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <input type="file" class="form-control mt-15" name="profilepic">
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Add New Team Member">
                                </div>
                            </form>
                            </div>
                        </section>
                    </div>
                </div>

               <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">All Team</h5>
                           
                            <div class="row">
                            	@forelse($teams as $c)
                            	<form method="post" action="{{ url('/admin/deleteteam')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                            		<input type="hidden" name="id" value="{{$c->id}}">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="name" value="{{$c->name}}" class="form-control mt-15" placeholder="write country name" readonly>
                                        </div>
                                         <div class="col-md-4">
                                            <input type="text" name="desig" value="{{$c->desig}}" class="form-control mt-15" placeholder="write country name" readonly>
                                        </div>
                                        <div class="col-md-2">
                                        	<img src="{{url('public/assets/profilepic')}}/{{$c->profilepic}}" class="mt-15" width="30">
                                            
                                        </div>
                                        <div class="col-md-2"><input type="submit" class="btn btn-primary mt-15 btn-sm" value="Delete Member"></div>
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