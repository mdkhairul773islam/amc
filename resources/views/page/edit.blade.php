@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('page.nav')

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Edit Page</h4>
                </div>

                <div class="panel_body">
                    <form action="{{route('admin.page.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$info->id}}">
                        
                        <div class="row">
                            @if(Auth::user()->privilege == 'super')
                            <div class="col-md-6">
                                <label>Page Type <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select name="type" id="pageType" onchange="setField()" class="form-control" required>
                                        <option value="page" {{($info->type == 'page' ? 'selected' : '')}}>Page</option>
                                        <option value="department" {{($info->type == 'department' ? 'selected' : '')}}>Department</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6 departmentWist">
                                <label>Department</label>
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="department_id" data-live-search="true">
                                        <option value="" selected>Select Department</option>
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
                             @else
                                <input type="hidden" id="pageType" onchange="setField()" name="type" value="{{$info->type}}">
                                <input type="hidden" name="department_id" value="{{$info->department_id}}">
                                <input type="hidden" name="title" value="{{$info->title}}">
                            @endif
                            
                            <div class="col-md-6">
                                <label>Featured Image</label>
                                <div class="form-group">
                                    <input type="file" name="featured_image" class="form-control">
                                    @if(!empty($info->featured_image))
                                        <img src="{{asset($info->featured_image)}}" style="max-width: 200px; width: auto; height: 150px; margin-top: 5px;" alt="">
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <label>Description </label>
                                <div class="form-group">
                                    <textarea name="description" id="description" placeholder="Your Description" class="form-control">{!! $info->description !!}</textarea>
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

        $('.departmentWist').hide();
        setField = () => {
            var pageType = $('#pageType').val();
            if(pageType === 'page'){
                $('.departmentWist').hide();
            }else{
                $('.departmentWist').show();
            }
        }
        setField();
    </script>
@endpush
