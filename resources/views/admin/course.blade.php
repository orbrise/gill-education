@extends('admin.layout.master')

@section('content')
<div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Programs</li>
                </ol>
            </nav>

       <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Programs Management</h4>
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
                            	<form method="post" action="{{ url('/admin/addpro')}}" enctype="multipart/form-data">
                            		{{csrf_field()}}
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="name" class="form-control mt-15" placeholder="write program name">
                                            
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control custom-select mt-15" name="uni">
                                                <option selected>Select University</option>
                                                @forelse($allu as $u)
                                                <option value="{{$u->id}}">{{$u->name}}</option>
                                                @empty
                                                @endforelse
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control custom-select mt-15" name="type">
                                                <option value="">Select Program Type</option>
                                                @forelse($types as $type)
                                                <option value="{{$type->name}}">{{$type->name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                        	<select class="form-control custom-select mt-15" name="category">
                                                <option value="">Select Category</option>
                                                @forelse($allc as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @empty
                                                @endforelse
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3" id="showsubcats">
                                        	<select class="form-control custom-select mt-15" name="subcategory">
                                                <option value="">Select Sub Category</option>
                                            
                                            </select>
                                        </div>
                                        

                                       
                                        
                                        
                                        
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Add New Program">
                                </div>
                            </form>
                            </div>
                        </section>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">All Programs</h5>
                           
                            <div class="row">
                            	<form method="get" action="{{url('/admin/programs')}}">
                            		<div class="row">
                            	<div class="col-sm-4">
                            		
                            		<select class="form-control custom-select mt-15" name="uni" required>
                                                <option value="">Select University</option>
                                                @forelse($allu as $u)
                                                <option value="{{$u->id}}" @if(!empty($_GET['uni'])) @if($_GET['uni'] == $u->id) selected @endif @endif>{{$u->name}}</option>
                                                @empty
                                                @endforelse
                                                
                                            </select>
                            	</div>

                            	 <div class="col-sm-4"><select class="form-control custom-select mt-15" name="category" required>
                                                <option value="All">All</option>
                                                @forelse($allc as $c)
                                                <option value="{{$c->id}}" @if(!empty($_GET['category'])) @if($_GET['category'] == $c->id) selected @endif @endif>{{$c->name}}</option>
                                                @empty
                                                @endforelse
                                                
                                            </select></div>
                                            <div class="col-sm-2 mt-15"><input type="submit" value="Search" class="btn btn-info btn-sm">
                                            </div>
                                        </div><br>
                                        </form>
                                            <br>
                                            @if(!empty($pros))
                                            <table class="table table-responsive">
                                            	<thead>
                                            		<th>Program Name</th>
                                            		<th>University</th>
                                            		<th>Category</th>
                                            		<th>Sub Cat</th>
                                            		<th>Program Type</th>
                                            		<th width="20%">Action</th>
                                            	</thead>
                                            	<tbody>
                                            		<tr>
                                            		@forelse($pros as $pro)
                                            		<form method="post" action="{{ url('/admin/updatpro')}}" enctype="multipart/form-data">
                            		               {{csrf_field()}}
                            		               <input type="hidden" name="id" value="{{$pro->id}}">
                                            		<td><input name="name" type="text" value="{{$pro->program_name}}" class="form-control"></td>
                                            		<td><select class="form-control custom-select" name="uni" required>
                                                <option value="">Select University</option>
                                                @forelse($allu as $u)
                                                <option value="{{$u->id}}" @if(!empty($_GET['uni'])) @if($pro->university == $u->id) selected @endif @endif>{{$u->name}}</option>
                                                @empty
                                                @endforelse
                                                
                                            </select></td>
                                            <td><select class="form-control custom-select" name="category" id="category" required>
                                                <option value="">Select Category</option>
                                                @forelse($allc as $c)
                                                <option value="{{$c->id}}" @if(!empty($_GET['category'])) @if($pro->category == $c->id) selected @endif @endif>{{$c->name}}</option>
                                                @empty
                                                @endforelse
                                                
                                            </select></td>
                                            <td><select class="form-control custom-select" name="subcat" required>
                                                <option value="">Select Sub Category</option>
                                                @forelse($subcats as $subcat)
                                                <option value="{{$subcat->id}}" @if($pro->subcat == $subcat->id) selected @endif>{{$subcat->name}}</option>
                                                @empty
                                                @endforelse
                                                
                                            </select></td>
                                            <td><select class="form-control custom-select" name="type">
                                                <option selected>Select Program Type</option>
                                                @forelse($types as $type)
                                                <option value="{{$type->name}}" @if($pro->program_type == $type->name) selected @endif </option>{{$type->name}}</option>
                                                @empty
                                                @endforelse
                                            </select></td>
                                            <td><button type="submit" class="btn btn-sm"><i class="fa fa-save"></i></button>
                                             <a href="{{url('/admin/programdetail/')}}/{{$pro->id}}" class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>
                                             <a href="@if($pro->delstatus == 1) {{url('admin/deactivate-pro/'.$pro->id)}} @else {{url('admin/activate-pro/'.$pro->id)}} @endif" class="btn @if($pro->delstatus == 1) btn-success @else btn-danger @endif btn-sm">
                                                @if($pro->delstatus == 1) Deactivate @else Activate @endif
                                            </a>
                                            </td>
                                        </tr>
                                        </form>
                                            @empty
                                            @endforelse
                                            	</tbody>

                                            </table>
                                            @endif

                            
                            </div>
                        


                        </section>
                    </div>
                </div>


      </div>
 </div>
@endsection

@push('js')
@include ('admin.ajax.script')
@endpush