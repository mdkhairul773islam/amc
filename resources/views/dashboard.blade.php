@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        <!-- body nav start -->
        <div class="body_nav">
            <ul>
                <li><a href="{{route('admin.department')}}">Department</a></li>
                <li><a href="{{route('admin.slider')}}">Slider</a></li>
                <li><a href="{{route('admin.settings')}}">Settings</a></li>
            </ul>
        </div>
        <!-- body nav start -->
        
        <!-- body content start -->
        <div class="body_content">
            <div class="box_wrapper">
                @if(!empty($designationWiseTeacherList))
                    @foreach($designationWiseTeacherList AS $key => $row)
                    <div class="dash_box box_{{++$key}}">
                        <h2>{{$row->name}}</h2>
                        <h3>{{$row->quantity}}</h3>
                    </div>
                    @endforeach
                @endif
                <div class="dash_box box_6">
                    <h2>Total Student</h2>
                    <h3>30000 +</h3>
                </div>
                <div class="dash_box box_5">
                    <h2>Total Department</h2>
                    <h3>20</h3>
                </div>
                <div class="dash_box box_7">
                    <h2>Faculty Members</h2>
                    <h3>220</h3>
                </div>
            </div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->
@endsection
