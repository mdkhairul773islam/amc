@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('teacher.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Teacher Details</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        @if(!empty($info->avatar))
                            <img class="img-thumbnail mb-2" src="{{asset($info->avatar)}}" style="width: 120px;" alt="">
                        @endif

                        <table class="table table-bordered list-table">
                            <tr>
                                <th>Joining Date</th>
                                <td>{{$info->joining_date}}</td>

                                <th>Name</th>
                                <td>{{$info->name}}</td>
                            </tr>

                            <tr>
                                <th>Mobile</th>
                                <td>{{$info->mobile}}</td>
                                <th>Email</th>
                                <td>{{$info->email}}</td>
                            </tr>

                            <tr>
                                <th>NID</th>
                                <td>{{$info->nid}}</td>
                                <th>Gender</th>
                                <td>{{$info->gender}}</td>
                            </tr>

                            <tr>
                                <th>Department</th>
                                <td>{{(!empty($info->department) ? $info->department->name: 'N/A')}}</td>
                                <th>Designation</th>
                                <td>{{(!empty($info->designation) ? $info->designation->name: 'N/A')}}</td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    Description: <br>
                                    {!! $info->description !!}
                                </td>
                            </tr>
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
