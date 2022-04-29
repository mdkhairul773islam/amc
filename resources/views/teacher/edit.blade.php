@extends('layouts.backend')
@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('teacher.nav')
    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Edit Teacher</h4>
                </div>

                <div class="panel_body">
                    <form action="{{route('admin.teacher.update')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$info->id}}">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Joining Date <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
                                    <input type="text" name="joining_date" value="{{$info->joining_date}}" class="form-control datepicker">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Name <span class="text-danger">*</span></label>
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
                                    <select class="form-control" name="gender" required>
                                        <option value="" selected>Select Gender</option>
                                        <option value="Male" {{($info->gender == 'Male' ? 'selected' : '')}}>Male</option>
                                        <option value="Female" {{($info->gender == 'Female' ? 'selected' : '')}}>Female</option>
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
                                        <option value="" selected>Select Designation</option>
                                        @if(!empty($designationList))
                                            @foreach($designationList as $key => $row)
                                                <option value="{{$row->id}}" {{($info->designation_id == $row->id ? 'selected' : '')}}>{{$row->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Photo <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>

                            @if(!empty($info->avatar))
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="{{asset($info->avatar)}}" style="width: 80px; height: 80px" alt="">
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <label>Description <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
                                    <textarea name="description" id="description" placeholder="Your Description" class="form-control" required>{{$info->description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn submit_btn" name="update">Update</button>
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

@push('footer-script')
    <!-- ckeditor4 js -->
    <script src="https:////cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        // ckeditor
        CKEDITOR.replace('description');
    </script>
@endpush

