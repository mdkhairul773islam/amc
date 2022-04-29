@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('speech.nav')

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Edit Speech</h4>
                </div>

                <div class="panel_body">
                    <form action="{{route('admin.speech.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$info->id}}">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Name <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="name" value="{{$info->name}}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <label>Designation <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="designation_id" data-live-search="true" required>
                                        @if(!empty($designationList))
                                            @foreach($designationList as $key => $row)
                                                <option value="{{$row->id}}" {{($info->designation_id == $row->id ? 'selected' : '')}}>{{$row->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <label>Department <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="department_id" data-live-search="true" required>
                                        @if(!empty($departmentList))
                                            @foreach($departmentList as $key => $row)
                                                <option value="{{$row->id}}" {{($info->department_id == $row->id ? 'selected' : '')}}>{{$row->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <label>Title <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="title" value="{{$info->title}}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <label>Photo</label>
                                <div class="form-group">
                                    @if(!empty($info->avatar))
                                        <img src="{{asset($info->avatar)}}" style="width: 120px; height: 120px;" alt="">
                                    @endif
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>
    
                            <div class="col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <textarea name="description" id="description" placeholder="Your Description" class="form-control" required>{!! $info->description !!}</textarea>
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
