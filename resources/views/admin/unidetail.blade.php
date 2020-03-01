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
                    <li class="breadcrumb-item active" aria-current="page">Universities</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$unid->name}}</li>
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
                            	<form method="post" action="{{ url('/admin/addunidetail')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                    <input type="hidden" name="uniid" value="{{$unid->id}}">
                                    <input type="hidden" name="uniname" value="{{$unid->name}}">
                                    <input type="hidden" name="slug" value="{{$unid->slug}}">

                                <div class="col-sm">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <img src="@if(!empty($unidd->featured_img)){{url('/public/assets/universities/fimg')}}/{{$unidd->featured_img}}@endif" width="200"><br>
                                            <label class="lab">Featured Image</label>
                                            <input type="file" name="fimg" class="form-control mt-15">
                                            
                                        </div>
                                    
                                        <div class="col-md-12">
                                            <label class="lab">Short Description</label>
                                        <textarea class="form-control" name="sdesc">@if(!empty($unidd->short_desc)){!! $unidd->short_desc !!}@endif</textarea>
                                    </div>
                                    
                                        <div class="col-md-12">
                                            <div class="tinymce-wrap">
                                                <label class="lab">Long Description</label>
                                        <textarea class="tinymce" name="longdesc">@if(!empty($unidd->long_desc)){!! $unidd->long_desc !!}@endif</textarea>
                                    </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="tinymce-wrap">
                                                <label class="lab">Ranking Info</label>
                                        <textarea class="tinymce" name="ranking">@if(!empty($unidd->ranking)){!! $unidd->ranking !!}@endif</textarea>
                                    </div>
                                        </div>
                                        

                                        <div class="col-md-12">
                                            <label class="lab">Youtube Link</label>
                                            <input type="text" class="form-control mt-15" value="@if(!empty($unidd->video_url)){!! $unidd->video_url !!}@endif" name="vlink">
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