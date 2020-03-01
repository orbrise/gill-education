@extends('admin.layout.master')

@section('content')
<div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sections</li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Sections Management</h4>
             </div>

             <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Manage Sections</h5>
                            @if(!empty(session('successmsg')))
                            <div class="alert alert-success">{{session('successmsg')}}</div>
                            @endif
                            <div class="row">
                            	<form method="post" action="{{ url('/admin/addsubsection')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                            <input type="text" name="name" class="form-control mt-15" placeholder="write Section name" value="{{App\Section::getsectionname($sectionid)}}" readonly>
                                            <input type="hidden" name="sectionid" value="{{$sectionid}}">
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <lable></lable>
                                            <input type="submit" class="btn btn-primary mt-15" value="Add New Sub Section"></div>
                                        
                                        
                                    </div>
                                   
                                    
                                </div>
                            </form>
                            </div>
                        </section>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">All Sections</h5>
                           
                          @if(!empty($sections))
                            	@forelse($sections as $s)
                            	<form method="post" action="{{ url('/admin/updatesubsection')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                            		<input type="hidden" name="id" value="{{$s->id}}">
                                
                                   <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="name" value="{{$s->name}}" class="form-control mt-15" placeholder="write country name" readonly>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <input type="text" value="{{App\Subsection::getcountries($s->countries)}}" class="form-control mt-15" readonly>
                                        </div>

                                        <div class="col-md-4"><input type="submit" class="btn btn-primary mt-15 btn-sm" value="Update Section">
                                        <a href="{{ url('admin/sectiondetail/')}}/{{$s->id}}" class="btn btn-info mt-15 btn-sm">Section Details</a>
                                        @if($s->delstatus == 1) 
                                        <a href="{{ url('admin/subsectiondeactivate')}}/{{$s->id}}" class="btn btn-success mt-15 btn-sm">Deactivate</a>
                                        @else
                                        <a href="{{ url('admin/subsectionactivate')}}/{{$s->id}}" class="btn btn-danger mt-15 btn-sm">Activate</a>
                                        @endif
                                </div>
                                </div>
                            </form>
                            @empty

                            @endforelse
                            @endif
                           
                        </section>
                    </div>
                </div>


      </div>
 </div>
@endsection