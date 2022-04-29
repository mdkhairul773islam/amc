@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('post.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Post</h4>
                </div>
                <div class="panel_body">
                    @if(Auth::user()->privilege != 'user')
                    <form action="{{route('admin.post')}}" method="post" class="hidden">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
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
                                <th style="width: 10px;">SL</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th style="white-space: nowrap;">Featured Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th style="width: 65px;" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($results))
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->created}}</td>
                                        <td>{{$row->title}}</td>
                                        <td><img src="{{asset($row->featured_image)}}" alt=""></td>
                                        <td>{{strLimit($row->description, 10)}}</td>
                                        <td class="font-weight-bold">{{strFilter($row->status)}}</td>
                                        <td class="operation_btn text-right print_hide">
                                            <a href="{{route('admin.post.edit', $row->id)}}" class="edit" title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.post.destroy', $row->id)}}"
                                               onclick="return confirm('Do you want to delete this data?')"
                                               class="delete" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
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
@endsection

@push('footer-script')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#DataTable').DataTable({
                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]]
            });
        });
    </script>
@endpush

