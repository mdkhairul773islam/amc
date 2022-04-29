@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Show Message</h4>
                </div>

                <div class="panel_body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 150px;">Full Name</th>
                            <td>{{$info->full_name}}</td>
                        </tr>

                        <tr>
                            <th>Mobile</th>
                            <td>{{$info->mobile}}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{$info->email}}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{{$info->description}}</td>
                        </tr>
                    </table>
                </div>
                <div class="panel_footer"></div>
            </div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->
@endsection
