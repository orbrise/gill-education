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
                    <li class="breadcrumb-item active" aria-current="page">Section</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$sd->name}}</li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Section Details</h4>
             </div>

             <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Manage Section
                            </h5>
                            @if(!empty(session('successmsg')))
                            <div class="alert alert-success">{{session('successmsg')}}</div>
                            @endif
                            <div class="row">
                            	<form method="post" action="{{ url('/admin/updatesecdetail')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$sd->id}}">
                                    
                                    
                                <div class="col-sm">
                                    <div class="row">
                                    
                                        <div class="col-md-12">
                                            <div class="tinymce-wrap">
                                                <label class="lab">Long Description</label>
                                        <textarea class="tinymce" name="detail">@if(!empty($sd->detail)){!! $sd->detail !!}@endif</textarea>
                                    </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="tinymce-wrap">
                                                <label class="lab">Countries</label>
                                        <select name="conts[]" class="form-control"  >
                                            <option value="">Select</option>
                                            @forelse($cons as $con)
                                            <option value="{{$con->id}}" @if(in_array($con->id,$selectedconts)) selected @endif>{{$con->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                                <br>
                                                Link 1
                                               <div class="col-sm-6">
                                            <input type="text" class="form-control mt-15" value="@if($sd->link1name){{$sd->link1name}}@endif" placeholder="Link Text" name="link1name">
                                            </div>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control mt-15" value="@if($sd->link1url){{$sd->link1url}}@endif" placeholder="Link URL" name="link1url">
                                            </div>
                            
                                            </div>
                                            <div class="col-sm-6">
                                                <br>
                                               Link 2
                                               <div class="col-sm-6">
                                            <input type="text" class="form-control mt-15" value="@if($sd->link2name){{$sd->link2name}}@endif" placeholder="Link Text" name="link2name">
                                            </div>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control mt-15" value="@if($sd->link2url){{$sd->link2url}}@endif" placeholder="Link URL"  name="link2url">
                                            </div>
                                         
                                            
                            
                                            </div>
                                        
                                    </div>
                                    <br>
                                    <input type="checkbox" name="unistatus" value="1" @if($sd->unistatus == 1) checked @endif> Universtiy Display
                                    <br><br>
                                       <h3>Scholarship</h3>
                                       <textarea class="tinymce" name="scholarship">@if(!empty($sd->scholarship)){!! $sd->scholarship !!}@endif</textarea>
                                    <br>
                                    <input type="submit" class="btn btn-info" value="Submit Section Details">
                                    
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