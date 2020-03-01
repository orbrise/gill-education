@extends('admin.layout.master')

@section('content')
<div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sub Categories</li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Create Sub Categories</h4>
             </div>

             <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Create Sub Categories</h5>
                            @if(!empty(session('successmsg')))
                            <div class="alert alert-success">{{session('successmsg')}}</div>
                            @endif
                            <div class="row">
                            	<form method="post" action="{{ url('/admin/addcountry')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select id="pcat" class="form-control">
                                                <option value="">select</option>
                                                @forelse($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="subcat">
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <button type="button" id="addsubcat" class="btn btn-primary" value="Add New Country"> Save New Sub Category</button> 
                                    <div id="res" class="text-success"></div>
                                </div>
                            </form>
                            </div>
                        </section>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Search Subcat</h5>
                           
                            <div class="row">
                                        <div class="col-md-6">
                                            <select id="pcats" class="form-control">
                                                <option value="">select</option>
                                                @forelse($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" id="searchsubcat" class="btn btn-info">Search</button>
                                        </div>
                                        <div class="col-sm-12" id="searchdata"></div>
                                        
                                    </div>
                        </section>
                    </div>
                </div>


      </div>
 </div>

@endsection

@push('js')
 @include('admin.ajax.script');
@endpush