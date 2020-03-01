@extends('admin.layout.master')

@push('css')
<style>
    .lab {margin-bottom: -2px; margin-top: 20px;}
</style>
@endpush
@section('content')
<div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Programs</li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Program Details Management</h4>
             </div>

             <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Manage Programs
                            </h5>
                            @if(!empty(session('successmsg')))
                            <div class="alert alert-success">{{session('successmsg')}}</div>
                            @endif
                            <div class="row">
                            	<form method="post" action="{{ url('/admin/updateprod')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                    <input type="hidden" name="uniid" value="{{$pro->uniimg->id}}">
                                    <input type="hidden" name="uniname" value="{{$pro->uniimg->name}}">
                                    <input type="hidden" name="proid" value="{{$pro->id}}">
                                    <input type="hidden" name="prodid" value="@if(!empty($pro->prod->id)){{$pro->prod->id}}@endif">
                                    

                                <div class="col-sm">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label class="lab">Degree</label>
                                      <input type="text" name="degree" class="form-control" value="@if(!empty($pro->prod->id)){{$pro->prod->degree}}@endif">
                                    </div>
                                    
                                        <div class="col-md-6">
                                            <div class="tinymce-wrap">
                                                <label class="lab">Discipline</label>
                                        <input type="text" name="dis" class="form-control" value="@if(!empty($pro->prod->id)){{$pro->prod->discipline}}@endif">
                                    </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="tinymce-wrap">
                                                <label class="lab">Duration</label>
                                       <input type="text" name="duration" class="form-control" value="@if(!empty($pro->prod->id)){{$pro->prod->duration}}@endif">
                                    </div>
                                        </div>
                                        

                                        <div class="col-md-6">
                                            <label class="lab">Univeristy Website </label>
                                            <input type="text" class="form-control mt-15" value="@if(!empty($pro->prod->id)){{$pro->prod->uni_web}}@endif" name="uniweb">
                                        </div>
                                         <div class="col-md-12">
                                            <div class="tinymce-wrap">
                                                <label class="lab">Description</label>
                                        <textarea class="tinymce" name="desc">@if(!empty($pro->prod->id)){!! $pro->prod->description !!} @else write description @endif</textarea>
                                    </div>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-info" value="Submit University Details">
                                </div>
                            </form>
                            </div>
                        </section>
                    </div>
                </div>

                 
                </div>


      </div>
 </div>
@endsection

@push('js')

 <script src="{{asset('public/admin/vendors/tinymce/tinymce.min.js')}}"></script>

    <!-- Tinymce Wysuhtml5 Init JavaScript -->
    <script src="{{asset('public/admin/dist/js/tinymce-data.js')}}"></script>

    @endpush