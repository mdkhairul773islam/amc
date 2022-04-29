@extends('layouts.backend')
@section('content')
    <!-- body container start -->
    <div class="body_container">
        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Slider</h4>
                    <div class="">
                        <a href="#" class="print_btn" id="plus" data-toggle="modal" data-target="#addModal" data-whatever="@mdo"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
                <div class="panel_body">
                    
                    @if(Auth::user()->privilege != 'user')
                    <form action="{{route('admin.slider')}}" class="hidden">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="type" class="form-control">
                                        <option value="" selected>All Image</option>
                                        <option value="home">Home</option>
                                        <option value="department">Department</option>
                                    </select>
                                </div>
                            </div>

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

                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="submit" class="btn submit_btn" name="show">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr class="mt-0 border-primary">
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered list-table" id="DataTable">
                            <thead>
                                <tr>
                                    <th width="10">SL</th>
                                    <th>Type</th>
                                    <th>Department</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Link</th>
                                    <th style="white-space: nowrap;">Slider Image</th>
                                    <th width="65" class="text-right print_hide">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{strFilter($row->type)}}</td>
                                        <td>{{(!empty($row->department) ? $row->department->name : 'N/A')}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{{strLimit($row->description, 15)}}</td>
                                        <td>{{$row->link}}</td>
                                        <td><img src="{{asset($row->avatar)}}" alt=""></td>
                                        <td class="operation_btn text-right print_hide">
                                            <a href="#" onclick="editData('{{$row->id}}')" data-toggle="modal"
                                               data-target="#editModal" data-whatever="@mdo" class="edit" title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.slider.destroy', $row->id)}}"
                                               onclick="return confirm('Do you want to delete this data?')"
                                               class="delete" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="position" value="{{$position}}">
                        
                        <div class="row">
                            
                            @if(Auth::user()->privilege != 'user')
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Type <span class="text-danger">*</span></label>
                                    <select name="type" id="sliderType" onchange="getShowDepartment()" class="form-control" required>
                                        <option value="" selected>Select Type</option>
                                        <option value="home">Home</option>
                                        <option value="department">Department</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6" id="departmentList">
                                <div class="form-group">
                                    <label class="form-label">Department <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control selectpicker" name="department_id"
                                                data-live-search="true">
                                            <option value="" selected>Select Department</option>
                                            @if(!empty($departmentList))
                                                @foreach($departmentList as $key => $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @else
                            	<input type="hidden" name="type" value="department">
                            	<input type="hidden" name="department_id" value="{{Auth::user()->department_id}}">
                            @endif

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Description <span class="text-danger"></span></label>
                                    <textarea name="description" id="description" placeholder="Your Description"
                                              class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Link <span class="text-danger"></span></label>
                                    <input type="text" name="link" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Slider Image <span class="text-danger">*</span></label>
                                    <input type="file" name="avatar" class="form-control" readonly>
                                </div>
                            </div>
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
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <form action="{{route('admin.slider.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="sliderId" name="id">

                        <div class="row">
                            @if(Auth::user()->privilege != 'user')
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Type <span class="text-danger">*</span></label>
                                    <select name="type" id="updateSliderType" onchange="updateGetShowDepartment()" class="form-control" required>
                                        <option value="home">Home</option>
                                        <option value="department">Department</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6" id="updateDepartmentList">
                                <div class="form-group">
                                    <label class="form-label">Department <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control" name="department_id" id="departmentId"
                                                data-live-search="true">
                                            <option value="">Select Department</option>
                                            @if(!empty($departmentList))
                                                @foreach($departmentList as $key => $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @else
                            	<input type="hidden" name="type" class="updateSliderType">
                            	<input type="hidden" name="department_id" class="departmentId">
                            @endif

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="sliderTitle" name="title" class="form-control" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Description <span class="text-danger"></span></label>
                                    <textarea id="sliderDescription" name="description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Link <span class="text-danger"></span></label>
                                    <input type="text" id="sliderLink" name="link" class="form-control " autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Slider Image <span class="text-danger">*</span></label>
                                    <input type="file" name="avatar" class="form-control" readonly>
                                    <img id="sliderAvatar" src="" alt="" style="max-width: 100px;">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Position <span class="text-danger"></span></label>
                                    <input type="text" id="sliderPosition" name="position" class="form-control " autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn submit_btn" name="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('footer-script')

    <!-- ckeditor4 js -->
    <script src="https:////cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>

    <script>

        // ckeditor
        CKEDITOR.replace('description');

        $(document).ready(function () {
            $('#DataTable').DataTable({
                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]]
            });
        });

        $('#departmentList').hide();

        function getShowDepartment() {
            var _sliderType = $("#sliderType").val();
            if (_sliderType == 'department') {
                $('#departmentList').show();
            } else {
                $('#departmentList').hide();
            }
        }

        // edit data
        function editData(id) {

            $("option:selected").removeAttr("selected");

            $('#departmentId').selectpicker('refresh');

            // set access token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // clear input data
            $('#sliderAvatar').hide();
            $('#sliderId').val('');
            $('#sliderTitle').val('');
            $('#sliderLink').val('');
            $('.updateSliderType').val('');
            $('.departmentId').val('');
            $('#sliderAvatar').attr('src', '');
            $('#sliderPosition').val('');
            $.ajax({
                type: "POST",
                url: "{{route('admin.slider.edit')}}",
                data: {id: id},
                dataType: 'json',
                success: function (response) {

                    let avatar = '{{asset('')}}' + response.avatar;

                    var editor = CKEDITOR.replace('sliderDescription');
                    editor.setData(response.description);

                    // set input data
                    $('#sliderId').val(response.id);
                    $('#sliderTitle').val(response.title);
                    $('#sliderLink').val(response.link);
                    $('#sliderPosition').val(response.position);
                    $('#sliderAvatar').attr('src', avatar);
                    
                    $('.updateSliderType').val(response.type);
                    $('.departmentId').val(response.department_id);

                    var updateSliderType = '#updateSliderType option[value=' + response.type + ']';
                    $(updateSliderType).attr('selected', 'selected');

                    if (response.type == 'department') {
                        var departmentId = '#departmentId option[value=' + response.department_id + ']';
                        $(departmentId).attr('selected', 'selected');
                    }

                    updateGetShowDepartment();

                    if (response.avatar != '') {
                        $('#sliderAvatar').show();
                    }
                }
            });
        }

        $('#updateDepartmentList').hide();

        function updateGetShowDepartment() {
            var _sliderType = $("#updateSliderType").val();
            if (_sliderType == 'department') {
                $('#updateDepartmentList').show();
            } else {
                $('#updateDepartmentList').hide();
            }

            $('#departmentId').selectpicker('refresh');
        }
    </script>
@endpush
