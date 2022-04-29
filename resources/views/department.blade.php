@extends('layouts.backend')
@section('content')
    <!-- body container start -->
    <div class="body_container">
        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Department</h4>
                    <div class="">
                        <a href="#" class="print_btn" id="plus" data-toggle="modal" data-target="#addModal"
                           data-whatever="@mdo">
                            <i class="fa fa-plus"></i> Add New
                        </a>
                    </div>
                </div>

                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered list-table" id="DataTable">
                            <thead>
                            <tr>
                                <th width="10">SL</th>
                                <th>Department</th>
                                <th>URL</th>
                                <th>Avatar</th>
                                <th width="65" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>
                                            @if(!empty($row->page->url))
                                            @php($url = 'home/department?department=' . strEncode($row->id))
                                                <a target="_blank" href="{{asset($url)}}">Page Link</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td>
                                            @if(!empty($row->page->featured_image))
                                                <img src="{{asset($row->page->featured_image)}}" width="150" height="80" alt="">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="operation_btn text-right print_hide">
                                            <a href="#" onclick="editData('{{$row->id}}')" data-toggle="modal"
                                               data-target="#editModal" data-whatever="@mdo" class="edit" title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.department.destroy', $row->id)}}"
                                               onclick="return confirm('Do you want to delete this data?')"
                                               class="delete" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="4" class="text-center">No record found....!</th>
                                </tr>
                            @endif
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
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form action="{{route('admin.department.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label">Department Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" autocomplete="off" required>
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
                <form action="{{route('admin.department.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="departmentId" name="id">

                        <div class="form-group">
                            <label class="form-label">Department Name <span class="text-danger">*</span></label>
                            <input type="text" id="departmentName" name="name" class="form-control " autocomplete="off"
                                   required>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#DataTable').DataTable({
                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]]
            });
        });

        function editData(id) {

            // set access token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // clear input data
            $('#departmentId').val('');
            $('#departmentName').val('');
            $.ajax({
                type: "POST",
                url: "{{route('admin.department.edit')}}",
                data: {id: id},
                dataType: 'json',
                success: function (response) {
                    // set input data
                    $('#departmentId').val(response.id);
                    $('#departmentName').val(response.name);
                },
            });
        }
    </script>
@endpush

