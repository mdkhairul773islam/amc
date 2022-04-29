@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('speech.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Speech</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th style="width: 40px;">SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th style="width: 125px;" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($results))
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><img src="{{asset($row->avatar)}}" style="width: 120px; height: 80px;" alt=""></td>
                                        <td>{{strFilter($row->name)}}</td>
                                        <td>{{(!empty($row->designation) ? $row->designation->name : '')}}</td>
                                        <td>{{(!empty($row->department) ? $row->department->name : '')}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{{strLimit($row->description, 10)}}</td>
                                        <td class="operation_btn text-right print_hide">
                                            <a href="{{route('admin.speech.edit', $row->id)}}" class="edit" title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{route('home.speech', $row->slug)}}" target="_blank" class="view" title="View">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.speech.destroy', $row->id)}}" onclick="return confirm('Do you want to delete this data?')" class="delete" title="Delete">
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
