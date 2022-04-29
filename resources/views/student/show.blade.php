@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('student.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Student Details</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">

                    @include('components.print')
                    <div class="table-responsive">

                        <table class="table table-bordered list-table">
                            <tr>
                                <th>Student ID</th>
                                <td>{{$info->custom_id}}</td>
                                <td colspan="2" rowspan="3">
                                    <div class="text-center">
                                        @if(!empty($info->photo))
                                            <img class="img-thumbnail mb-2" src="{{asset($info->photo)}}" style="max-width: 100px; max-height: 120px;" alt="Photo Not Found!">
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Student Name</th>
                                <td>{{$info->name}}</td>
                            </tr>
                            <tr>
                                <th>Student Mobile</th>
                                <td>{{$info->student_mobile}}</td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td>{{(!empty($info->department) ? $info->department->name : "N/A")}}</td>
                                <th>Student Email</th>
                                <td>{{$info->email}}</td>
                            </tr>

                            <tr>
                                <th>Date of Birth</th>
                                <td>{{$info->dob}}</td>
                                <th>Religion</th>
                                <td>{{$info->religion}}</td>
                            </tr>
                            
                            <tr>
                                <th>Present Address</th>
                                <td>{{$info->present_address}}</td>
                                <th>Permanent Address</th>
                                <td>{{$info->permanent_address}}</td>
                            </tr>

                            <tr>
                                <th>Gender</th>
                                <td>{{$info->gender}}</td>
                                <th>Father's Name</th>
                                <td>{{$info->father_name}}</td>
                            </tr>

                            <tr>
                                <th>Father's Profession</th>
                                <td>{{$info->father_profession}}</td>
                                <th>Father's Mobile</th>
                                <td>{{$info->father_mobile}}</td>
                            </tr>

                            <tr>
                                <th>Mother's Name</th>
                                <td>{{$info->mother_name}}</td>
                                <th>Mother's Profession</th>
                                <td>{{$info->mother_profession}}</td>
                            </tr>
                            
                            <tr>
                                <th>Mother's Mobile</th>
                                <td>{{$info->mother_mobile}}</td>
                                <th>Guardian's Name</th>
                                <td>{{$info->guardian_name}}</td>
                            </tr>

                            <tr>
                                <th>Guardian's Profession</th>
                                <td>{{$info->guardian_profession}}</td>
                                <th>Guardian's Mobile</th>
                                <td>{{$info->guardian_mobile}}</td>
                            </tr>

                            <tr>
                                <th>Class</th>
                                <td>{{$info->class}}</td>
                                <th>Session</th>
                                <td>{{$info->session}}</td>
                            </tr>

                            <tr>
                                <th>Roll</th>
                                <td>{{$info->roll}}</td>
                                <th>Year</th>
                                <td>
                                    @if($info->class != "HSC")
                                    {{ strFilter($info->year) }}
                                    @else
                                    {{ strFilter($info->hsc_year) }}
                                    @endif
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
