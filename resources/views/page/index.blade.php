@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('page.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Pages</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    @if(Auth::user()->privilege != 'user')
                    <form action="{{route('admin.page')}}" method="post" class="hidden">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="page_type" class="form-control">
                                        <option value="" selected>All Page Type</option>
                                        <option value="page">Page</option>
                                        <option value="department">Department</option>
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
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered list-table" id="DataTable">
                            <thead>
                            <tr>
                                <th style="width: 10px;">SL</th>
                                <th>Page Type</th>
                                <th>Department</th>
                                <th>Title</th>
                                <th>Featured Image</th>
                                <th>Description</th>
                                <th style="width: 85px;" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($results))
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{strFilter($row->type)}}</td>
                                        <td>{{(!empty($row->department) ? $row->department->name : 'N/A')}}</td>
                                        <td>{{$row->title}}</td>
                                        <td><img src="{{asset($row->featured_image)}}" alt=""></td>
                                        <td>{{strLimit($row->description, 10)}}</td>
                                        <td class="operation_btn text-right print_hide">
                                            @php($viewBtn = ($row->type == 'page' ? route('home.page', $row->url) : asset('home/department?department=' . strEncode($row->department_id))))
                                            <a href="{{route('admin.page.edit', $row->id)}}" class="edit" title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{$viewBtn}}" target="_blank" class="view" title="View">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            @if(Auth::user()->privilege == 'super')
                                                <a href="{{route('admin.page.destroy', $row->id)}}"
                                                   onclick="return confirm('Do you want to delete this data?')"
                                                   class="delete" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            @endif
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
