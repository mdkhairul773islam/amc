@extends('layouts.backend')
@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('media.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Image Gallery</h4>
                    <div class="">
                        <a href="#" class="print_btn" id="plus" data-toggle="modal" data-target="#addModal" data-whatever="@mdo"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.media.image')}}" method="post" class="hidden">
                        @csrf
                        
                        <div class="row">
                            @if(Auth::user()->privilege != 'user')
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="department_id" data-live-search="true">
                                        <option value="" selected>Select Department</option>
                                        @if(!empty($departmentList))
                                            @foreach($departmentList as $key => $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="status" class="form-control">
                                        <option value="" selected>Select Status</option>
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn submit_btn" name="show">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr class="mt-0 border-primary">
                    
                    <div class="row">
                        @if(!empty($results) && $results->isNotEmpty())
                            @foreach($results as $key => $row)
                                <div class="col-lg-3 col-sm- col-6">
                                    <div class="gallery_content">
                                        <div class="gallery_img">
                                            <img src="{{asset($row->avatar)}}" alt="">
                                            <div class="cover">
                                                <a href="#" onclick="copyToClipboard('{{$row->avatar}}', 'post')"
                                                   title="Copy image with site url"
                                                   class="view">
                                                    <i class="far fa-copy"></i>
                                                </a>
                                                <a href="#" onclick="editData('{{$row->id}}')" data-toggle="modal"
                                                   data-target="#editModal" data-whatever="@mdo" class="edit"
                                                   title="Edit">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="{{route('admin.media.destroy', $row->id)}}"
                                                   onclick="return confirm('Do you want to delete this data?')"
                                                   class="delete" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <h5 class="gallery_title">{{(!empty($row->title) ? $row->title : 'N/A')}}</h5>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="panel_footer"></div>
            </div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->


    <!-- Add modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form action="{{route('admin.media.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="media_type" value="image">

                        @if(Auth::user()->privilege != 'user')
                        <div class="form-group">
                            <label class="form-label required">Department </label>
                            <select name="department_id" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Department</option>
                                @if(!empty($departmentList))
                                    @foreach($departmentList as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @else
                            <input type="hidden" name="department_id" value="{{Auth::user()->department_id}}">
                        @endif

                        <div class="form-group">
                            <label class="form-label">Title </label>
                            <input type="text" name="title" class="form-control modal_form" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Upload Image <span class="text-danger">*</span></label>
                            <input type="file" name="avatar" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="publish" selected>Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn submit_btn" name="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form action="{{route('admin.media.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Update Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="mediaId" name="id">
                        <input type="hidden" name="media_type" value="image">
                        
                        @if(Auth::user()->privilege != 'user')
                        <div class="form-group">
                            <label class="form-label required">Department </label>
                            <select name="department_id" id="mediaDepartmentId" class="form-control" data-live-search="true" required>
                                <option value="">Select Department</option>
                                @if(!empty($departmentList))
                                    @foreach($departmentList as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @else
                            <input type="hidden" name="department_id" class="mediaDepartmentId">
                        @endif

                        <div class="form-group">
                            <label class="form-label">Title </label>
                            <input type="text" id="mediaTitle" name="title" class="form-control modal_form" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Upload Image <span class="text-danger">*</span></label>
                            <img id="mediaAvatar" src="" alt="" style="width: 150px; height: 80px;">
                            <input type="file" name="avatar" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select id="mediaStatus" name="status" class="form-control" required>
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn submit_btn" name="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('header-style')
    <style>
        .gallery_content {
            border: 4px solid #F2F2F2;
            margin: 10px 0;
            border-top: none;
            border-left: none;
        }

        .gallery_img {
            border: 1px solid #efefef;
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .gallery_img .cover {
            justify-content: flex-end;
            position: absolute;
            display: flex;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px 15px;
            align-items: flex-start;
        }

        .gallery_img img {
            object-fit: cover;
            overflow: hidden;
            border: none;
            height: 100%;
            width: 100%;
            transition: all .2s;
        }

        .gallery_content:hover img {
            transform: scale(1.1);
        }

        .gallery_content .gallery_title {
            text-transform: uppercase;
            white-space: nowrap;
            font-size: 14px;
            margin: 0;
            padding: 10px 0;
            font-weight: 600;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .gallery_content a.delete:hover {
            background: #D92114;
        }

        .gallery_content a.delete {
            background: #EC4034;
            color: #fff;
        }

        .gallery_content a.delete:focus,
        .gallery_content a.view:hover {
            background: #1C6AD1;
        }

        .gallery_content a.view {
            background: #3B84E5;
            color: #fff;
            font-size: 14px;
        }

        .gallery_content a.view:focus,
        .gallery_content a.edit:hover {
            background: #449D44;
        }

        .gallery_content a.edit {
            background: #5CB85C;
            color: #fff;
        }

        .gallery_content a.edit:focus,
        .gallery_content a {
            background: rgba(48, 63, 159, 0.1);
            display: inline-block;
            text-align: center;
            color: #303F9F;
            width: 30px;
            height: 30px;
            margin: 2px 0;
            font-size: 13px;
            margin-left: 5px;
            line-height: 30px;
            border-radius: 2px;
            transition: all .2s;
        }

        .gallery_content a i {
            vertical-align: middle;
        }

        .gallery_content a:focus,
        .gallery_content a:hover {
            background: rgba(48, 63, 159, 0.3);
        }
    </style>
@endpush

@push('footer-script')
    <script>

        const copyToClipboard = (str, type) => {
            event.preventDefault();
            const el = document.createElement('textarea');
            el.value = (type == 'post' ? window.location.protocol + '//' + window.location.host + '/' : '') + str;

            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        };

        function editData(id) {

            // set access token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // clear input data

            $('#mediaId').val('');
            $('#mediaTitle').val('');
            $('mediaDepartmentId').val('');
            $('#mediaAvatar').hide();
            $('#mediaAvatar').attr('src', '');
            $.ajax({
                type: "POST",
                url: "{{route('admin.media.edit')}}",
                data: {id: id},
                dataType: 'json',
                success: function (response) {

                    let avatar = '{{asset('')}}' + response.avatar;

                    // set input data
                    $('#mediaId').val(response.id);
                    $('#mediaTitle').val(response.title);
                    $('.mediaDepartmentId').val(response.department_id);
                    $('#mediaAvatar').attr('src', avatar);

                    var mediaDepartmentId = '#mediaDepartmentId option[value=' + response.department_id + ']';
                    $(mediaDepartmentId).attr('selected', 'selected');

                    var mediaStatus = '#mediaStatus option[value=' + response.status + ']';
                    $(mediaStatus).attr('selected', 'selected');
                    $('#mediaDepartmentId').selectpicker('refresh');


                    if (response.avatar != '') {
                        $('#mediaAvatar').show();
                    }
                },
            });
        }
    </script>
@endpush
