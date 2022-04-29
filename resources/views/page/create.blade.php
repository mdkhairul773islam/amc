@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('page.nav')

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Add New Page</h4>
                </div>

                <div class="panel_body">
                    <form action="{{route('admin.page.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Page Type <span class="text-danger">*</span></label>
                                    <select name="type" id="pageType" onchange="setField()" class="form-control" required>
                                        <option value="page">Page</option>
                                        <option value="department">Department</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea name="description" id="description" placeholder="Your Description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn submit_btn" name="save">Save</button>
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
