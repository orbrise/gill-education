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
                    <li class="breadcrumb-item active" aria-current="page">About Page Detail</li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Abou Details</h4>
             </div>

             <div class="row">
                    <div class="col-md-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">About Details
                            </h5>
                            @if(!empty(session('successmsg')))
                            <div class="alert alert-success">{{session('successmsg')}}</div>
                            @endif
                            
                            	<form method="post" action="{{ url('/admin/addaboutdetail')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                

                                        
                                            <div class="tinymce-wrap">
                                                
                                        <textarea class="tinymce form-control" name="long_desc">@if(!empty($about->content)){{$about->content}}@endif</textarea>
                                    </div>
                                   

                                       
                                   
                                    <br>
                                    <input type="submit" class="btn btn-info" value="Submit Country Details">
                               
                                 
                            </form>
                           
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