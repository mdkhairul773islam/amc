@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('notice.nav')
    
        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Notice</h4>
                </div>
                <div class="panel_body">
                    @if(Auth::user()->privilege != 'user')
                    <form action="{{route('admin.notice')}}" method="post" class="hidden">
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
                                <th width="10">SL</th>
                                <th>Date</th>
                                <th>Department</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>File</th>
                                <th width="65" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->created}}</td>
                                        <td>{{(!empty($row->department) ? $row->department->name : '')}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{{(!empty($row->description) ? strLimit($row->description, 15) : 'N/A')}}</td>
                                        <td>
                                            @if(!empty($row->path))
                                                <a title="{{$row->title}}" href="{{asset($row->path)}}" download>Download</a>
                                            @endif
                                        </td>
                                        <td class="operation_btn text-right print_hide">
                                            <a href="{{route('admin.notice.edit', $row->id)}}" class="edit" title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.notice.destroy', $row->id)}}"
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