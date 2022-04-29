@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('notice.nav')

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Edit Notice</h4>
                </div>

                <div class="panel_body">
                    <form action="{{route('admin.notice.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$info->id}}"> 
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <label class="form-label">Date <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="created" value="{{$info->created}}" class="form-control datepicker" required>
                                </div>
                            </div>
                            
                            @if(Auth::user()->privilege != 'user')
                            <div class="col-md-6">
                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select name="department_id" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="" selected>Select Department</option>
                                        @if(!empty($departmentList))
                                            @foreach($departmentList as $row)
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
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="title" value="{{$info->title}}" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">File <span style="color: red;">(.pdf, .jpg, .jpeg, .png)</span></label>
                                <div class="form-group">
                                    <input type="file" name="path" class="form-control" autocomplete="off">
                                    @if(!empty($info->path))
                                        <img src="{{asset($info->path)}}" style="width: 100px;" alt="">
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label">Description <span class="text-danger"></span></label>
                                <div class="form-group">
                                    <textarea name="description" id="description" placeholder="Your Description" class="form-control">{{$info->description}}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn submit_btn" name="submit">Update</button>
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
