@extends('layouts.backend')
@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('staff.nav')
        
        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Edit Staff</h4>
                </div>

                <div class="panel_body">
                    <form action="{{route('admin.staff.update')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$info->id}}">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Joining Date <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
                                    <input type="text" name="created" value="{{$info->joining_date}}" class="form-control datepicker">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Staff Name <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="name" value="{{$info->name}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Mobile Number <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
                                    <input type="text" name="mobile" value="{{$info->mobile}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Email ID <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
                                    <input type="email" name="email" value="{{$info->email}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>NID <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
                                    <input type="text" name="nid" value="{{$info->nid}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Gender <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="gender" data-live-search="true" required>
                                        <option value="" selected>Select Gender</option>
                                        <option value="Male" {{($info->gender == 'Male' ? 'selected' : '')}}>Male</option>
                                        <option value="Female" {{($info->gender == 'Female' ? 'selected' : '')}}>Female
                                        </option>
                                    </select>
                                </div>
                            </div>
                            
                            @if(Auth::user()->privilege != 'user')
                            <div class="col-md-6">
                                <label>Department <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="department_id" data-live-search="true" required>
                                        <option value="" selected>Select Department</option>
                                        @if(!empty($departmentList))
                                            @foreach($departmentList as $key => $row)
                                                <option value="{{$row->id}}" {{($info->department_id == $row->id ? 'selected' : '')}}>{{$row->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            @else
                            	<input type="hidden" name="department_id" value="{{$info->department_id}}">
                            @endif
                            
                            <div class="col-md-6">
                                <label>Designation <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="designation_id" data-live-search="true" required>
                                        <option value="">Select Designation</option>
                                        @if(!empty($designation))
                                            @foreach($designation as $key => $row)
                                            <option value="{{$row->id}}" {{($row->id == $info->designation_id ? 'selected' : '')}}>{{$row->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Photo <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
                                    <input type="file" name="photo" class="form-control">
                                    <img style="width: 200px" class="mt-1" src="{{asset($info->avatar)}}" alt="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Address <span class="text-danger">&nbsp;</span></label>
                                    <div class="form-group">
                                    <textarea name="address" rows="3" class="form-control">{{$info->address}}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn submit_btn" name="save">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel_footer"></div>
            </div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->
@endsection
