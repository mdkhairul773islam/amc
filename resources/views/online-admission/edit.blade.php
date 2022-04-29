@extends('layouts.backend')

@section('content')
<!-- body container start -->
<div class="body_container">
    <!-- body content start -->
    <div class="body_content">
        <div class="panel_container">
            <div class="panel_heading">
                <h4>Edit Student</h4>
            </div>

            <div class="panel_body">
                <form enctype='multipart/form-data' action="{{route('admin.online-admission.update')}}" method="POST" class="g-3 needs-validation" novalidate>
                    @csrf()
                    <input type="hidden" class="form-control" name="id" value="{{ $info->id }}" >
                    
                    <div class="col-12">
                        <fieldset class="fieldset_border">
                            <legend class="fieldset_border mb-3"> All Images </legend>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row text-center">
                                        @if(!empty($info->student_photo))
                                        <div class="col-4">
                                            <h4 class="text-info border border-info rounded-pill">Student Profile Photo</h4>
                                            <img class="img-thumbnail mb-2" src="{{asset($info->student_photo)}}" style="max-width: 100px; max-height: 100px;" alt="Photo Not Found!">
                                        </div>
                                        @endif
                                        @if(!empty($info->student_sign))
                                        <div class="col-4">
                                            <h4 class="text-info border border-info rounded-pill">Student Signature</h4>
                                            <img class="img-thumbnail mb-2" src="{{asset($info->student_sign)}}" style="max-width: 100%; max-height: 150px;" alt="Photo Not Found!">
                                        </div>
                                        @endif
                                        @if(!empty($info->guardian_sign))
                                        <div class="col-4">
                                            <h4 class="text-info border border-info rounded-pill">Guardian Signature</h4>
                                            <img class="img-thumbnail mb-2" src="{{asset($info->guardian_sign)}}" style="max-width: 100%; max-height: 150px;" alt="Photo Not Found!">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="fieldset_border">
                            <legend class="fieldset_border mb-3"> Student Information</legend>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="validationFormNo" class="form-label"> Form No. <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="form_no" value="{{ $info->form_no }}" id="validationFormNo" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Form No.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationRegiNo" class="form-label"> Student Registration No. <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="student_id" value="{{ $info->student_id }}" id="validationRegiNo" autocomplete="off" >
                                    <div class="invalid-feedback">
                                        Please Enter Your Form No.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationNameBn" class="form-label"> Student Name <small>(Bangla)</small> <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="name_bn" value="{{ $info->name_bn }}" id="validationNameBn" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Name Bangla.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationNameEn" class="form-label"> Student Name <small>(English) [ In Upper Case ]</small> <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="name_en" value="{{ $info->name_en }}" id="validationNameEn" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Name In English.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationBirthNo" class="form-label">Student Birth Certificate No. <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="birth_no" value="{{ $info->birth_no }}" id="validationBirthNo" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Birth Certificate No.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationDob" class="form-label"> Student Date Of Birth <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control datepicker" name="dob" value="{{ $info->dob }}" id="validationDob" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Date Of Birth.
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="validationBloodGroup" class="form-label"> Student Blood Group </label>
                                    <select id="validationBloodGroup" name="blood_group" class="form-control selectpicker" data-live-search="true">
                                        <option selected>Select Blood Group</option>
                                        <option value="AB+" {{ ($info->blood_group == "AB+" ? 'selected' : '') }} >AB+</option>
                                        <option value="AB-" {{ ($info->blood_group == "AB-" ? 'selected' : '') }} >AB-</option>
                                        <option value="A+" {{ ($info->blood_group == "A+" ? 'selected' : '') }} >A+</option>
                                        <option value="A-" {{ ($info->blood_group == "A-" ? 'selected' : '') }} >A-</option>
                                        <option value="B+" {{ ($info->blood_group == "B+" ? 'selected' : '') }} >B+</option>
                                        <option value="B-" {{ ($info->blood_group == "B-" ? 'selected' : '') }} >B-</option>
                                        <option value="O+" {{ ($info->blood_group == "O+" ? 'selected' : '') }} >O+</option>
                                        <option value="O-" {{ ($info->blood_group == "O-" ? 'selected' : '') }} >O-</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Your Blood Group.
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="validationGender" class="form-label"> Student Gender </label>
                                    <select id="validationGender" name="gender" class="form-control selectpicker" data-live-search="true">
                                        <option selected> Select Gender </option>
                                        <option value="male" {{ ($info->gender == "male" ? 'selected' : '') }}>Male</option>
                                        <option value="female" {{ ($info->gender == "female" ? 'selected' : '') }}>Female</option>
                                        <option value="other" {{ ($info->gender == "other" ? 'selected' : '') }}>Other</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Your Gender
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationMobile" class="form-label"> Student Mobile <span class="rq">&nbsp;*</span></label>
                                    <input type="tel" class="form-control" name="mobile" value="{{ $info->mobile }}" id="validationMobile" autocomplete="off" required >
                                    <div class="invalid-feedback">
                                        Please Enter Your Mobile.
                                    </div>
                                </div>

                                <div class="hr_style">&nbsp;</div>

                                <div class="col-6 mb-3">
                                    <label for="validationFatherNameBn" class="form-label"> Father's Name <small>(Bangla)</small><span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="father_name_bn" value="{{ $info->father_name_bn }}" id="validationFatherNameBn" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Father's Name.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationFatherNameEn" class="form-label"> Father's Name <small>(English) [ In Upper Case ]</small><span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="father_name_en" value="{{ $info->father_name_en }}" id="validationFatherNameEn" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Father's Name.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationFatherQualification" class="form-label"> Father's Qualification <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="father_qualification" value="{{ $info->father_qualification }}" id="validationFatherQualification" >
                                    <div class="invalid-feedback">
                                        Please Enter Your Father's Qualification.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationFatherProfession" class="form-label"> Father's Profession <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="father_profession" value="{{ $info->father_profession }}" id="validationFatherProfession" >
                                    <div class="invalid-feedback">
                                        Please Enter Your Father's Profession.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationFatherIncome" class="form-label"> Father's Income <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="father_income" value="{{ $info->father_income }}" id="validationFatherIncome" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Father's Income.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationFatherNid" class="form-label"> Father's NID <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="father_nid" value="{{ $info->father_nid }}" id="validationFatherNid" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please Enter Your Father's NID.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationFatherDob" class="form-label"> Father's Date Of Birth <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control datepicker" name="father_dob" value="{{ $info->father_dob }}" id="validationFatherDob" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please Enter Your Father's Date Of Birth.
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="validationFatherMobile" class="form-label"> Father's Mobile <span class="rq">&nbsp;*</span></label>
                                    <input type="tel" class="form-control" name="father_mobile" value="{{ $info->father_mobile }}" id="validationFatherMobile" autocomplete="off" required >
                                    <div class="invalid-feedback">
                                        Please Enter Your Father Mobile.
                                    </div>
                                </div>

                                <div class="hr_style">&nbsp;</div>

                                <div class="col-6 mb-3">
                                    <label for="validationMotherNameBn" class="form-label"> Mother's Name <small>(Bangla)</small><span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="mother_name_bn" value="{{ $info->mother_name_bn }}" id="validationMotherNameBn" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Mother's Name Bangla.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationMotherNameEn" class="form-label"> Mother's Name <small>(English) [ In Upper Case ]</small><span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="mother_name_en" value="{{ $info->mother_name_en }}" id="validationMotherNameEn" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Mother's Name English.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationMotherQualification" class="form-label"> Mother's Qualification <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="mother_qualification" value="{{ $info->mother_qualification }}" id="validationMotherQualification" >
                                    <div class="invalid-feedback">
                                        Please Enter Your Mother's Qualification.
                                    </div>
                                </div>

                                
                                <div class="col-6 mb-3">
                                    <label for="validationMotherProfession" class="form-label"> Mother's Profession <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="mother_profession" value="{{ $info->mother_profession }}" id="validationMotherProfession" >
                                    <div class="invalid-feedback">
                                        Please Enter Your Mother's Profession.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationMotherIncome" class="form-label"> Mother's Income <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="mother_income" value="{{ $info->mother_income }}" id="validationMotherIncome" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please Enter Your Mother's Income.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationMotherNid" class="form-label"> Mother's NID <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="mother_nid" value="{{ $info->mother_nid }}" id="validationMotherNid" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please Enter Your Mother's NID.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationMotherDob" class="form-label"> Mother's Date Of Birth <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control datepicker" name="mother_dob" value="{{ $info->mother_dob }}" id="validationMotherDob" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please Enter Your Mother's Date Of Birth.
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="validationMotherMobile" class="form-label"> Mother's Mobile <span class="rq">&nbsp;*</span></label>
                                    <input type="tel" class="form-control" name="mother_mobile" value="{{ $info->mother_mobile }}" id="validationMotherMobile" autocomplete="off" required >
                                    <div class="invalid-feedback">
                                        Please Enter Your Mother Mobile.
                                    </div>
                                </div>

                                <div class="hr_style">&nbsp;</div>

                                <div class="col-6 mb-3">
                                    <label for="validationGuardianName" class="form-label"> Guardian's Name <small>(If father is not alive)</small><span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="guardian_name" value="{{ $info->guardian_name }}" id="validationGuardianName" >
                                    <div class="invalid-feedback">
                                        Please Enter Your Guardian's Name.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationGuardianRelation" class="form-label"> Guardian's Relation <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="guardian_relation" value="{{ $info->guardian_relation }}" id="validationGuardianRelation" >
                                    <div class="invalid-feedback">
                                        Please Enter Your Guardian's Relation.
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="validationGuardianIncome" class="form-label"> Guardian's Income <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="guardian_income" value="{{ $info->guardian_income }}" id="validationGuardianIncome" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please Enter Your Guardian's Income.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationGuardianNid" class="form-label"> Guardian's NID <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control" name="guardian_nid" value="{{ $info->guardian_nid }}" id="validationGuardianNid" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please Enter Your Guardian's NID.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationGuardianDob" class="form-label"> Guardian's Date Of Birth <span class="rq">&nbsp;</span></label>
                                    <input type="text" class="form-control datepicker" name="guardian_dob" value="{{ $info->guardian_dob }}" id="validationGuardianDob" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please Enter Your Guardian's Date Of Birth.
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="validationGuardianMobile" class="form-label"> Guardian Mobile <span class="rq">&nbsp;*</span></label>
                                    <input type="tel" class="form-control" name="guardian_mobile" value="{{ $info->guardian_mobile }}" id="validationGuardianMobile" autocomplete="off" required >
                                    <div class="invalid-feedback">
                                        Please Enter Your Guardian Mobile.
                                    </div>
                                </div>

                                <div class="hr_style">&nbsp;</div>
                                
                                <div class="col-6 mb-3">
                                    <label for="validationReligion" class="form-label">Religion <span class="rq">&nbsp;*</span></label>
                                    <select id="validationReligion" name="religion" class="form-control selectpicker" required>
                                        <option selected> select Religion </option>
                                        <option value="islam" {{ ($info->religion == "islam" ? 'selected' : '') }}> Islam </option>
                                        <option value="hindu" {{ ($info->religion == "hindu" ? 'selected' : '') }}> Hindu </option>
                                        <option value="buddhism" {{ ($info->religion == "buddhism" ? 'selected' : '') }}> Buddhism </option>
                                        <option value="christian" {{ ($info->religion == "christian" ? 'selected' : '') }}> Christian </option>
                                        <option value="other" {{ ($info->religion == "other" ? 'selected' : '') }}> Other </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Your Religion.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationMaritalStatus" class="form-label"> Marital Status <span class="rq">&nbsp;*</span></label>
                                    <select id="validationMaritalStatus" name="marital_status" class="form-control" required>
                                        <option selected> Select Marital Status </option>
                                        <option value="Married" {{ ($info->marital_status == "Married" ? 'selected' : '') }} > Married </option>
                                        <option value="Unmarried" {{ ($info->marital_status == "Unmarried" ? 'selected' : '') }} > Unmarried </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Your Marital Status.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationPresentAddress" class="form-label"> Present Address <span class="rq">&nbsp;*</span></label>
                                    <textarea class="form-control" name="present_address" rows="4" id="validationPresentAddress" required >{{ $info->guardian_mobile }}</textarea>
                                    <div class="invalid-feedback">
                                        Please Enter Your Present Address.
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="validationPermanentAddress" class="form-label"> Permanent Address <span class="rq">&nbsp;*</span></label>
                                    <textarea class="form-control" name="permanent_address" rows="4" id="validationPermanentAddress" required >{{ $info->guardian_mobile }}</textarea>
                                    <div class="invalid-feedback">
                                        Please Enter Your Permanent Address.
                                    </div>
                                </div>

                                <div class="col-4 mb-3">
                                    <label for="validationNationality" class="form-label">Nationality <span class="rq">&nbsp;*</span></label>
                                    <select id="validationNationality" name="nationality" value="{{ $info->nationality }}" class="form-control selectpicker" data-live-search="true" required>
                                        <option selected> Select Nationality </option>
                                        <option value="Bangladeshi" {{ ($info->nationality == "Bangladeshi" ? 'selected' : '') }}>Bangladeshi</option>
                                        <option value="Other" {{ ($info->nationality == "Other" ? 'selected' : '') }}>Other</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Your Nationality.
                                    </div>
                                </div>

                                <div class="col-4 mb-3">
                                    <label for="validationDivision" class="form-label">Division <span class="rq">&nbsp;*</span></label>
                                    <select id="validationDivision" name="division" class="form-control selectpicker" data-live-search="true" required>
                                        <option selected> Select Division </option>
                                        @foreach($divisions as $key => $division)
                                        <option value="{{$division->name}}" {{ ($info->division == $division->name ? 'selected' : '') }} >{{$division->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Your Division.
                                    </div>
                                </div>
    
                                <div class="col-4 mb-3">
                                    <label for="validationDistrict" class="form-label">Own District<span class="rq">&nbsp;*</span></label>
                                    <select id="validationDistrict" name="district" class="form-control selectpicker" data-live-search="true" required>
                                        <option selected> Select District </option>
                                        @foreach($districts as $key => $district)
                                            <option value="{{ $district->name }}" {{ ($info->district == $district->name ? 'selected' : '') }} >{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Your District.
                                    </div>
                                </div>

                                <div class="col-4 mb-3">
                                    <label for="validationUpazila" class="form-label">Upazila <span class="rq">&nbsp;*</span></label>
                                    <select id="validationUpazila" name="upazila" class="form-control selectpicker" data-live-search="true" required>
                                        <option selected> Select Upazila </option>
                                        @foreach($upazilas as $key => $upazila)
                                            <option value="{{ $upazila->name }}" {{ ($info->upazila == $upazila->name ? 'selected' : '') }} >{{ $upazila->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Your Upazila.
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="fieldset_border">
                            <legend class="fieldset_border"> SSC Information </legend>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="validationRegiNo" class="form-label"> Ragistation No. <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="ssc_regi_no" value="{{ $info->ssc_regi_no }}" id="validationRegiNo" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Ragistation No.
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="validationBoardRoll" class="form-label"> Board Roll <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="ssc_board_roll" value="{{ $info->ssc_board_roll }}" id="validationBoardRoll" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Board Roll.
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="validationBoardName" class="form-label"> Board Name <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="ssc_board_name" value="{{ $info->ssc_board_name }}" id="validationBoardName" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Board Name.
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="validationPassingYear" class="form-label"> Passing Year <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="ssc_passing_year" value="{{ $info->ssc_passing_year }}" id="validationPassingYear" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Passing Year.
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="validationGpa" class="form-label"> GPA <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="ssc_gpa" value="{{ $info->ssc_gpa }}" id="validationGpa" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your GPA.
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="validationGrade" class="form-label">Grade <span class="rq">&nbsp;*</span></label>
                                    <select class="form-control selectpicker" name="ssc_grade" id="validationGrade" data-live-search="true" required>
                                        <option selected> Select Grade </option>
                                        <option value="A+" {{ ($info->ssc_grade == "A+" ? 'selected' : '') }} >A+</option>
                                        <option value="A" {{ ($info->ssc_grade == "A" ? 'selected' : '') }} >A</option>
                                        <option value="A-" {{ ($info->ssc_grade == "A-" ? 'selected' : '') }} >A-</option>
                                        <option value="B" {{ ($info->ssc_grade == "B" ? 'selected' : '') }} >B</option>
                                        <option value="C" {{ ($info->ssc_grade == "C" ? 'selected' : '') }} >C</option>
                                        <option value="D" {{ ($info->ssc_grade == "D" ? 'selected' : '') }} >D</option>
                                    </select>
                                    
                                    <div class="invalid-feedback">
                                        Please Enter Your Grade.
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="validationInstituteName" class="form-label"> SSC Pass From Institute Name <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="ssc_institute" value="{{ $info->ssc_institute }}" id="validationInstituteName" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your SSC Pass From Institute Name.
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="validationCenterName" class="form-label"> Exam Center Name <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="ssc_center" value="{{ $info->ssc_center }}" id="validationCenterName" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your SSC Exam Center Name.
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="fieldset_border">
                            <legend class="fieldset_border"> HSC Information</legend>
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="validationSession" class="form-label">Session <span class="rq">&nbsp;*</span></label>
                                    <select class="form-control selectpicker" name="hsc_session" id="validationSession" data-live-search="true" required>
                                        <option selected> Select Session </option>
                                        @for ($i = date('Y')-2; $i < date('Y')+2; $i++)
    									<?php $session = "$i-" . ($i + 1); ?>
    									<option value="{{ $session }}" {{ ($info->hsc_session == $session ? 'selected' : '') }} >{{ $session }}</option>
    									@endfor
                                    </select>
                                    
                                    <div class="invalid-feedback">
                                        Please Enter Your Session.
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="validationRoll" class="form-label"> Roll <span class="rq">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="hsc_roll" value="{{ $info->hsc_roll }}" id="validationRoll" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please Enter Your Roll.
                                    </div>
                                </div>

                                <div class="col-4 mb-3">
                                    <label for="validationSection" class="form-label">Section <span class="rq">&nbsp;*</span></label>
                                    <select class="form-control selectpicker" name="hsc_section" id="validationSection" data-live-search="true" required>
                                        <option selected> Select Section</option>
                                        <option value="None">None</option>
                                        <option value="A" {{ ($info->hsc_session == "A" ? 'selected' : '') }} >A</option>
                                        <option value="B" {{ ($info->hsc_session == "B" ? 'selected' : '') }} >B</option>
                                        <option value="C" {{ ($info->hsc_session == "C" ? 'selected' : '') }} >C</option>
                                        <option value="D" {{ ($info->hsc_session == "D" ? 'selected' : '') }} >D</option>
                                    </select>
                                    
                                    <div class="invalid-feedback">
                                        Please Enter Your Section.
                                    </div>
                                </div>
                                
                                <div class="col-4 mb-3">
                                    <label for="validationGroup" class="form-label">Group <span class="rq">&nbsp;*</span></label>
                                    <select class="form-control selectpicker" name="hsc_group" id="validationGroup" data-live-search="true" required>
                                        <option selected> Select Group </option>
                                        <option value="others" {{ ($info->hsc_group == "others" ? 'selected' : '') }} >Others</option>
                                        <option value="science" {{ ($info->hsc_group == "science" ? 'selected' : '') }} >Science</option>
                                        <option value="huminities" {{ ($info->hsc_group == "huminities" ? 'selected' : '') }} >Huminities</option>
                                        <option value="business_studies" {{ ($info->hsc_group == "business_studies" ? 'selected' : '') }} >Business Studies</option>
                                    </select>
                                    
                                    <div class="invalid-feedback">
                                        Please Enter Your Group.
                                    </div>
                                </div>
                                
                                <div class="col-4 mb-3">
                                    <label for="validationClass" class="form-label">Class <span class="rq"> &nbsp;*</span></label>
                                    <select class="form-control selectpicker" name="hsc_class" id="validationClass" data-live-search="true" required>
                                        <option selected> Select Class </option>
                                        <option value="Eleven" {{ ($info->hsc_class == "Eleven" ? 'selected' : '') }} > Eleven </option>
                                        <option value="Twelve" {{ ($info->hsc_class == "Twelve" ? 'selected' : '') }} > Twelve </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Enter Your Class.
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="fieldset_border">
                            <legend class="fieldset_border"> All Photo Upload </legend>
                            <div class="row">
                                <div class="col-4">
                                    <label for="validationFile" class="form-label"> Student Photo <span class="rq">&nbsp;*</span></label>
                                    <input class="form-control" name="student_photo" type="file" id="validationFile" required>
                                    <div class="invalid-feedback">
                                        Please Upload Your Photo.
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="validationSign" class="form-label"> Student Sign <span class="rq">&nbsp;*</span></label>
                                    <input class="form-control" name="student_sign" type="file" id="validationSign" required>
                                    <div class="invalid-feedback">
                                        Please Upload Your Sign.
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="validationGuardianSign" class="form-label"> Guardian Sign <span class="rq">&nbsp;*</span></label>
                                    <input class="form-control" name="guardian_sign" type="file" id="validationGuardianSign" required>
                                    <div class="invalid-feedback">
                                        Please Upload Guardian Sign.
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="col-12 clearfix text-right">
                        <div class="btn-group mb-3 mt-3">
                            <input type="submit" class="btn submit_btn" value="Save">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel_footer"></div>
        </div>
    </div>
    <!-- body content end -->
</div>
<!-- body container end -->
@endsection

@push('footer-style')
    <style>
        .hr_style {display: block;width: 100%;border-top: 1px solid #0B499D !important;}
        fieldset.fieldset_border {
            border: 1px solid #0B499D !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #0B499D;
            box-shadow: 0px 0px 0px 0px #0B499D;
            margin-top: 30px !important;
        }
        legend.fieldset_border {
            font-size: 1.5em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            padding: 0 10px;
            border-bottom: none;
            margin-top: -22px;
            background-color: white;
            color: #0B499D;
        }
    </style>
@endpush
@push('footer-script')
    <script type="text/javascript">
        $('#hsc').hide();
        $('#others').hide();
        function getYear() {
            var _selectClass = $("#selectClass").val();
            if (_selectClass == 'HSC') {
                $('#hsc').show();
                $('#others').hide();
            } else {
                $('#hsc').hide();
                $('#others').show();
            }
        }
        getYear();
    </script>
@endpush