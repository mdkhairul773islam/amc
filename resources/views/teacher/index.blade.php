@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('teacher.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Teacher</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.teacher')}}" method="post" class="hidden">
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
                                    <select class="form-control selectpicker" name="designation_id" data-live-search="true">
                                        <option value="" selected>Select Designation</option>
                                        @if(!empty($designationList))
                                            @foreach($designationList as $key => $row)
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


                    <div class="table-responsive">
                        <table class="table table-bordered list-table" id="DataTable">
                            <thead>
                            <tr>
                                <th style="width: 10px;">SL</th>
                                <th>Joining Date</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th style="width: 85px;" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($results))
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->joining_date}}</td>
                                        <td><img src="{{asset($row->avatar)}}" style="width: 80px; height: 80px" alt="">
                                        </td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->mobile}}</td>
                                        <td>{{(!empty($row->department) ? $row->department->name : '')}}</td>
                                        <td>{{(!empty($row->designation) ? $row->designation->name : '')}}</td>
                                        <td class="operation_btn text-right print_hide">
                                            <a href="{{route('admin.teacher.edit', $row->id)}}" class="edit"
                                               title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.teacher.show', $row->id)}}" class="view"
                                               title="View">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.teacher.destroy', $row->id)}}" class="delete"
                                               title="Delete"
                                               onclick="return confirm('Do you want to delete this data?')">
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
