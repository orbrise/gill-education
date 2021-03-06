@extends('admin.layout.master')

@section('content')
<div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Franchises</li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Manage Franchises</h4>
             </div>

             <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            
                            @if(!empty(session('successmsg')))
                            <div class="alert alert-success">{{session('successmsg')}}</div>
                            @endif
                            <div class="row">
                            	<form method="post" action="{{ url('/admin/addfranchise')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Contact Person</label>
                                            <input type="text" name="cpname" class="form-control" placeholder="write contact person name" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Business Name</label>
                                            <input type="text" name="bname" class="form-control" placeholder="write contact business name" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Business Address</label>
                                           <input type="text" name="baddress" class="form-control" placeholder="write contact business address" required>
                                        </div>
                                        
                                        <div class="col-md-3" id="showsubcats">
                                            <label>Country</label>
                                        	<select class="form-control custom-select" name="country" required>
                                                <option value="">Select Sub Category</option>
                                                @forelse($allc as $con)
                                                <option value="{{$con->id}}">{{$con->name}}</option>
                                                @empty
                                                @endforelse
                                            
                                            </select>
                                        </div>
                                        <br>
                                        <div class="col-md-3" style="margin-top:7px">
                                            <label>Business Email</label>
                                           <input type="text" name="email" class="form-control" placeholder="write email address" required>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Add New Franchise">
                                </div>
                            </form>
                            </div>
                        </section>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">All Franchises</h5>
                           
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Contact Person</th>
                                    <th>Business Name</th>
                                    <th>Business Address</th>
                                    <th>Country</th>
                                    <th>Email</th>
                                    <th width="15%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($franchises as $fr)
                                        <tr>
                                            <form action="{{ url('/admin/updatefranchise')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="pid" value="{{$fr->id}}">
                                            <td>
                                                 <input type="text" name="cpname" class="form-control" value="{{$fr->name}}" placeholder="write contact person name">
                                            </td>
                                            <td><input type="text" name="bname" class="form-control" value="{{$fr->bname}}" placeholder="write contact business name"></td>
                                            <td><input type="text" name="baddress" class="form-control" value="{{$fr->baddress}}" placeholder="write contact business address"></td>
                                            <td><select class="form-control custom-select" name="country">
                                                <option value="">Select Sub Category</option>
                                                @forelse($allc as $con)
                                                <option value="{{$con->id}}" @if($con->id == $fr->country)selected @endif>{{$con->name}}</option>
                                                @empty
                                                @endforelse
                                            
                                            </select></td>
                                            <td><input type="text" name="email" class="form-control" value="{{$fr->email}}" placeholder="write email address"></td>
                                            <td><button type="submit" class="btn btn-success btn-sm"><i class="fa  fa-save"></i></button> <a href="{{url('admin/delfranchise')}}/{{$fr->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                            </form>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                            </table>
                        


                        </section>
                    </div>
                </div>


      </div>
 </div>
@endsection

@push('js')
@include ('admin.ajax.script')
@endpush