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
                    <li class="breadcrumb-item active" aria-current="page">Country Details</li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Country Details</h4>
             </div>

             <div class="row">
                    <div class="col-md-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Country Details
                            </h5>
                            @if(!empty(session('successmsg')))
                            <div class="alert alert-success">{{session('successmsg')}}</div>
                            @endif
                            <div class="row">
                            	<form method="post" action="{{ url('/admin/addcountrydetail')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                    <input type="hidden" name="country_id" value="{{$id}}">

                                <div class="col-sm-12">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="tinymce-wrap">
                                                
                                        <textarea class="tinymce" name="long_desc">@if(!empty($countryd->long_desc)){{$countryd->long_desc}}@endif</textarea>
                                    </div>
                                        </div>

                                       <br>
                                        
                                            <div class="col-sm-6">
                                                <br>
                                                Link 1
                                               <div class="col-sm-6">
                                            <input type="text" class="form-control mt-15" value="@if(!empty($countryd->link1name)){{$countryd->link1name}}@endif" placeholder="Link Text" name="link1name">
                                            </div>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control mt-15" value="@if(!empty($countryd->link1url)){{$countryd->link1url}}@endif" placeholder="Link URL" name="link1url">
                                            </div>
                            
                                            </div>
                                            <div class="col-sm-6">
                                                <br>
                                               Link 1
                                               <div class="col-sm-6">
                                            <input type="text" class="form-control mt-15" value="@if(!empty($countryd->link2name)){{$countryd->link2name}}@endif" placeholder="Link Text" name="link2name">
                                            </div>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control mt-15" value="@if(!empty($countryd->link2url)){{$countryd->link2url}}@endif" placeholder="Link URL"  name="link2url">
                                            </div>
                            
                                            </div>
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-info" value="Submit Country Details">
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