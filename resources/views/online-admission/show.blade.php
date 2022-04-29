@extends('layouts.backend')

@section('content')
<!-- body container start -->
<div class="body_container">
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
                            <th>Form No.</th>
                            <td>{{$info->form_no}}</td>
                            <td colspan="2" rowspan="4">
                                <div class="text-center">
                                    @if(!empty($info->student_photo))
                                        <img class="img-thumbnail mb-2" src="{{asset($info->student_photo)}}" style="max-width: 100px; max-height: 100px;" alt="Photo Not Found!">
                                    @endif
                                    @if(!empty($info->student_sign))
                                        <img class="img-thumbnail mb-2" src="{{asset($info->student_sign)}}" style="max-width: 180px; max-height: 100px;" alt="Photo Not Found!">
                                    @endif
                                    @if(!empty($info->guardian_sign))
                                        <img class="img-thumbnail mb-2" src="{{asset($info->guardian_sign)}}" style="max-width: 180px; max-height: 100px;" alt="Photo Not Found!">
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Student ID</th>
                            <td>{{$info->student_id}}</td>
                        </tr>
                        <tr>
                            <th>Student Name(Bangla)</th>
                            <td>{{ $info->name_bn }}</td>
                        </tr>
                        <tr>
                            <th>Student Name(English)</th>
                            <td>{{ $info->name_en }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">Student Mobile</th>
                            <td style="width: 30%;">{{$info->mobile}}</td>
                            <th style="width: 20%;">Date of Birth</th>
                            <td style="width: 30%;">{{$info->dob}}</td>
                        </tr>

                        <tr>
                            <th>Religion</th>
                            <td>{{$info->religion}}</td>
                            <th>Gender</th>
                            <td>{{$info->gender}}</td>
                        </tr>

                        <tr>
                            <th>Father's Name</th>
                            <td>{{$info->father_name_bn}}</td>
                            <th>Father's Profession</th>
                            <td>{{$info->father_profession}}</td>
                        </tr>

                        <tr>
                            <th>Father's Mobile</th>
                            <td>{{$info->father_mobile}}</td>
                            <th>Mother's Name</th>
                            <td>{{$info->mother_name_bn}}</td>
                        </tr>

                        <tr>
                            <th>Mother's Profession</th>
                            <td>{{$info->mother_profession}}</td>
                            <th>Mother's Mobile</th>
                            <td>{{$info->mother_mobile}}</td>
                        </tr>
                        
                        <tr>
                            <th>Guardian's Name</th>
                            <td>{{$info->guardian_name_bn}}</td>
                            <th>Guardian's Mobile</th>
                            <td>{{$info->guardian_mobile}}</td>
                        </tr>
                        
                        <tr>
                            <th>Present Address</th>
                            <td>{{$info->present_address}}</td>
                            <th>Permanent Address</th>
                            <td>{{$info->permanent_address}}</td>
                        </tr>
                        
                        <tr>
                            <th>Nationality</th>
                            <td>{{$info->nationality}}</td>
                            <th>Division</th>
                            <td>{{$info->division}}</td>
                        </tr>
                        
                        <tr>
                            <th>District</th>
                            <td>{{$info->district}}</td>
                            <th>Upazila</th>
                            <td>{{$info->upazila}}</td>
                        </tr>
                        
                        <tr>
                            <th>SSC Board Roll</th>
                            <td>{{$info->ssc_board_roll}}</td>
                            <th>SSC Board Name</th>
                            <td>{{$info->ssc_board_name}}</td>
                        </tr>
                        
                        <tr>
                            <th>SSC Passing Year</th>
                            <td>{{$info->ssc_passing_year}}</td>
                            <th>SSC GPA</th>
                            <td>{{$info->ssc_gpa}}</td>
                        </tr>
                        
                        <tr>
                            <th>SSC Grade</th>
                            <td>{{$info->ssc_grade}}</td>
                            <th>SSC Institute</th>
                            <td>{{$info->ssc_institute}}</td>
                        </tr>
                        
                        <tr>
                            <th>HSC Class</th>
                            <td>{{$info->hsc_class}}</td>
                            <th>HSC Session</th>
                            <td>{{$info->hsc_session}}</td>
                        </tr>

                        <tr>
                            <th>HSC Roll</th>
                            <td>{{$info->hsc_roll}}</td>
                            <th>HSC Section</th>
                            <td>{{$info->hsc_section}}</td>
                        </tr>

                        <tr>
                            <th>HSC Group</th>
                            <td>{{$info->hsc_group}}</td>
                            <th>Status</th>
                            <td>{{$info->status}}</td>
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
