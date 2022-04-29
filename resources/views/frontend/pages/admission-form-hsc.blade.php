<!doctype html>
<html lang="en">
    <head>
        <!-- required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="u7pslmWaWuv1pujn3hVOlGSLkCWzRoNUJKIAFh3I">

        <!-- title -->
        <title>Ananda Mohan College</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- selectpicker css -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
		<!-- datepicker css -->
		<link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
        
        <!-- include css -->
        <link rel="stylesheet" href="http://anandamohangovtcollege.edu.bd/frontend/style/admission.css">
        
        <!-- Angular -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <!-- banner -->
                    <div class="col">
                        <div class="row header_banner">
                            <div class="col-2">
                                <figure>
                                    <img class="img-thumbnail" src="http://anandamohangovtcollege.edu.bd/public/uploads/logo/10-1642065591.png" alt="Uploaded banner not found!" />
                                </figure>
                            </div>
                            <div class="col-10 text-center">
                                <h1>Ananda Mohan College</h1>
                                <h4>Mymensingh</h4>
                                <p>College Code: 7325 || EIIN No. 111911</p>
                            </div>
                        </div>
                    </div>
                    <!-- Header -->
                    <div class="col">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <h2 class="text-center"><strong> HSC Admission Form </strong></h2>
                    </div>
                    
                    
                    <!-- All Admission Form Start Here -->
                    <form enctype='multipart/form-data' action="{{asset('home/admission-hsc-store')}}" method="POST" class="g-3 needs-validation" novalidate>
                        @csrf()
                        
                        <div class="col-12">
                            <fieldset class="fieldset_border">
                                <!--<legend class="fieldset_border"> </legend>-->
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="validationTxnId" class="form-label font-weight-bolder"> Surecash TXN ID <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="txn_id" id="validationTxnId" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Surecash TXN ID
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="validationFormNo" class="form-label font-weight-bolder"> Form No. <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="form_no" id="validationFormNo" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Form No.
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="validationClassRoll" class="form-label font-weight-bolder"> Class Roll <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="hsc_roll" id="validationClassRoll" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your HSC Class Roll
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="validationSecurityCode" class="form-label font-weight-bolder"> Security Code <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="security_code" id="validationSecurityCode" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Security Code
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        
                        <div class="col-12">
                            
                            <fieldset class="fieldset_border">
                                <legend class="fieldset_border"> SSC Information </legend>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="validationBoardName" class="form-label"> Board Name <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="ssc_board_name" id="validationBoardName" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Board Name.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationBoardRoll" class="form-label"> Board Roll <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="ssc_board_roll" id="validationBoardRoll" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Board Roll.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationSscGpa" class="form-label"> GPA <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="ssc_gpa" id="validationSscGpa" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your GPA.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationSscGrade" class="form-label">Grade <span class="rq">&nbsp;*</span></label>
                                        <select class="form-control selectpicker" name="ssc_grade" id="validationSscGrade" data-live-search="true" required>
                                            <option selected> Select Grade </option>
                                            <option value="A+">A+</option>
                                            <option value="A">A</option>
                                            <option value="A-">A-</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Enter Your Grade.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationSscGroup" class="form-label">Group <span class="rq">&nbsp;*</span></label>
                                        <select class="form-control selectpicker" name="ssc_group" id="validationSscGroup" data-live-search="true" required>
                                            <option selected> Select Group </option>
                                            <option value="others">Others</option>
                                            <option value="science">Science</option>
                                            <option value="huminities">Huminities</option>
                                            <option value="business_studies">Business Studies</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Enter Your SSC Group.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationSscPassingYear" class="form-label"> Passing Year <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="ssc_passing_year" id="validationSscPassingYear" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your SSC Passing Year.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <label for="validationSscRegiNo" class="form-label"> Ragistation No. <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="ssc_regi_no" id="validationSscRegiNo" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your SSC Ragistation No.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <label for="validationSscSession" class="form-label">Session <span class="rq">&nbsp;*</span></label>
                                        <select class="form-control selectpicker" name="ssc_session" id="validationSscSession" data-live-search="true" required>
                                            <option selected> Select Session </option>
                                            @for ($i = date('Y')-2; $i < date('Y')+2; $i++)
        									<?php $session = "$i-" . ($i + 1); ?>
        									<option value="{{ $session }}">{{ $session }}</option>
        									@endfor
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Enter Your SSC Session.
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            
                            
                            <fieldset class="fieldset_border">
                                <legend class="fieldset_border"> Student Information</legend>
                                <div class="row">
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationNameBn" class="form-label"> Student Name <small>(Bangla)</small> <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="name_bn" id="validationNameBn" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Name Bangla.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationEsifSerialNo" class="form-label"> eSIF Serial No. <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="esif_no" id="validationEsifSerialNo" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your eSIF Serial No.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationNameEn" class="form-label"> Student Name <small>(English) [ In Upper Case ]</small> <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="name_en" id="validationNameEn" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Name In English.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationQuota" class="form-label"> Quota </label>
                                        <select id="validationQuota" name="quota" class="form-control selectpicker" data-live-search="true">
                                            <option selected>Select Quota</option>
                                            <option value="FQ" >FQ</option>
                                            <option value="EQ" >EQ</option>
                                            <option value="SQ" >SQ</option>
                                            <option value="PQ" >PQ</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Your Quota
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationBirthNo" class="form-label">Student Birth Certificate No. <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="birth_no" id="validationBirthNo" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Birth Certificate No.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationEsifSection" class="form-label"> Section <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="section" id="validationSection" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Section
                                        </div>
                                    </div>
                                    
                                    <!--<div class="col-4 mb-3">
                                        <label for="validationSection" class="form-label">Section <span class="rq">&nbsp;*</span></label>
                                        <select class="form-control selectpicker" name="hsc_section" id="validationSection" data-live-search="true" required>
                                            <option selected> Select Section</option>
                                            <option value="None">None</option>
                                            <option value="A" >A</option>
                                            <option value="B" >B</option>
                                            <option value="C" >C</option>
                                            <option value="D" >D</option>
                                            <option value="E" >E</option>
                                        </select>
                                        
                                        <div class="invalid-feedback">
                                            Please Enter Your Section.
                                        </div>
                                    </div>-->

                                    <!--<div class="col-6 mb-3">
                                        <label for="validationFormNo" class="form-label"> Form No. <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="form_no" id="validationFormNo" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Form No.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationRegiNo" class="form-label"> Student Registration No. <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="student_id" id="validationRegiNo" autocomplete="off" >
                                        <div class="invalid-feedback">
                                            Please Enter Your Form No.
                                        </div>
                                    </div>-->

                                    

                                    

                                    

                                    <div class="col-6 mb-3">
                                        <label for="validationDob" class="form-label"> Student Date Of Birth <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control datepicker" name="dob" id="validationDob" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Date Of Birth.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationBloodGroup" class="form-label"> Student Blood Group </label>
                                        <select id="validationBloodGroup" name="blood_group" class="form-control selectpicker" data-live-search="true">
                                            <option selected>Select Blood Group</option>
                                            <option value="AB+" >AB+</option>
                                            <option value="AB-" >AB-</option>
                                            <option value="A+" >A+</option>
                                            <option value="A-" >A-</option>
                                            <option value="B+" >B+</option>
                                            <option value="B-" >B-</option>
                                            <option value="O+" >O+</option>
                                            <option value="O-" >O-</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Your Blood Group.
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationGender" class="form-label"> Student Gender </label>
                                        <select id="validationGender" name="gender" class="form-control selectpicker" data-live-search="true">
                                            <option selected> Select Gender </option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Your Gender
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationMobile" class="form-label"> Student Mobile <span class="rq">&nbsp;*</span></label>
                                        <input type="tel" class="form-control" name="mobile" id="validationMobile" autocomplete="off" required >
                                        <div class="invalid-feedback">
                                            Please Enter Your Mobile.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationEmail" class="form-label"> Student Email <span class="rq">&nbsp;*</span></label>
                                        <input type="tel" class="form-control" name="email" id="validationEmail" autocomplete="off" required >
                                        <div class="invalid-feedback">
                                            Please Enter Your Email
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationReligion" class="form-label">Religion <span class="rq">&nbsp;*</span></label>
                                        <select id="validationReligion" name="religion" class="form-control selectpicker" required>
                                            <option selected> select Religion </option>
                                            <option value="islam"> Islam </option>
                                            <option value="hindu"> Hindu </option>
                                            <option value="buddhism"> Buddhism </option>
                                            <option value="christian"> Christian </option>
                                            <option value="other"> Other </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Your Religion.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationMaritalStatus" class="form-label"> Marital Status <span class="rq">&nbsp;*</span></label>
                                        <select id="validationMaritalStatus" name="marital_status" class="form-control" required>
                                            <option selected> Select Marital Status </option>
                                            <option value="Married" > Married </option>
                                            <option value="Unmarried" > Unmarried </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Your Marital Status.
                                        </div>
                                    </div>

                                    <div class="hr_style">&nbsp;</div>

                                    <div class="col-6 mb-3">
                                        <label for="validationFatherNameBn" class="form-label"> Father's Name <small>(Bangla)</small><span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="father_name_bn" id="validationFatherNameBn" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Father's Name.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationFatherNameEn" class="form-label"> Father's Name <small>(English) [ In Upper Case ]</small><span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="father_name_en" id="validationFatherNameEn" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Father's Name.
                                        </div>
                                    </div>

                                    <!--<div class="col-6 mb-3">
                                        <label for="validationFatherQualification" class="form-label"> Father's Qualification <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="father_qualification" id="validationFatherQualification" >
                                        <div class="invalid-feedback">
                                            Please Enter Your Father's Qualification.
                                        </div>
                                    </div>-->

                                    <div class="col-6 mb-3">
                                        <label for="validationFatherProfession" class="form-label"> Father's Profession <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="father_profession" id="validationFatherProfession" >
                                        <div class="invalid-feedback">
                                            Please Enter Your Father's Profession.
                                        </div>
                                    </div>

                                    <!--<div class="col-6 mb-3">
                                        <label for="validationFatherIncome" class="form-label"> Father's Income <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="father_income" id="validationFatherIncome" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Father's Income.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationFatherNid" class="form-label"> Father's NID <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="father_nid" id="validationFatherNid" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please Enter Your Father's NID.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationFatherDob" class="form-label"> Father's Date Of Birth <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control datepicker" name="father_dob" id="validationFatherDob" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please Enter Your Father's Date Of Birth.
                                        </div>
                                    </div>-->
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationFatherMobile" class="form-label"> Father's Mobile <span class="rq">&nbsp;*</span></label>
                                        <input type="tel" class="form-control" name="father_mobile" id="validationFatherMobile" autocomplete="off" required >
                                        <div class="invalid-feedback">
                                            Please Enter Your Father Mobile.
                                        </div>
                                    </div>

                                    <div class="hr_style">&nbsp;</div>

                                    <div class="col-6 mb-3">
                                        <label for="validationMotherNameBn" class="form-label"> Mother's Name <small>(Bangla)</small><span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="mother_name_bn" id="validationMotherNameBn" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Mother's Name Bangla.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationMotherNameEn" class="form-label"> Mother's Name <small>(English) [ In Upper Case ]</small><span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="mother_name_en" id="validationMotherNameEn" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Mother's Name English.
                                        </div>
                                    </div>

                                    <!--<div class="col-6 mb-3">
                                        <label for="validationMotherQualification" class="form-label"> Mother's Qualification <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="mother_qualification" id="validationMotherQualification" >
                                        <div class="invalid-feedback">
                                            Please Enter Your Mother's Qualification.
                                        </div>
                                    </div>-->

                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationMotherProfession" class="form-label"> Mother's Profession <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="mother_profession" id="validationMotherProfession" >
                                        <div class="invalid-feedback">
                                            Please Enter Your Mother's Profession.
                                        </div>
                                    </div>

                                    <!--<div class="col-6 mb-3">
                                        <label for="validationMotherIncome" class="form-label"> Mother's Income <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="mother_income" id="validationMotherIncome" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please Enter Your Mother's Income.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationMotherNid" class="form-label"> Mother's NID <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="mother_nid" id="validationMotherNid" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please Enter Your Mother's NID.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationMotherDob" class="form-label"> Mother's Date Of Birth <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control datepicker" name="mother_dob" id="validationMotherDob" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please Enter Your Mother's Date Of Birth.
                                        </div>
                                    </div>-->
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationMotherMobile" class="form-label"> Mother's Mobile <span class="rq">&nbsp;*</span></label>
                                        <input type="tel" class="form-control" name="mother_mobile" id="validationMotherMobile" autocomplete="off" required >
                                        <div class="invalid-feedback">
                                            Please Enter Your Mother Mobile.
                                        </div>
                                    </div>

                                    <div class="hr_style">&nbsp;</div>

                                    <div class="col-6 mb-3">
                                        <label for="validationGuardianNameBn" class="form-label"> Guardian's Name <small>(Bangla)</small> <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="guardian_name_bn" id="validationGuardianNameBn" >
                                        <div class="invalid-feedback">
                                            Please Enter Your Guardian's Name Bangla
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationGuardianNameEn" class="form-label"> Guardian's Name <small>(English) [ In Upper Case ]</small> <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="guardian_name_en" id="validationGuardianNameEn" >
                                        <div class="invalid-feedback">
                                            Please Enter Your Guardian's Name English
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationGuardianRelation" class="form-label"> Guardian's Relation <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="guardian_relation" id="validationGuardianRelation" >
                                        <div class="invalid-feedback">
                                            Please Enter Your Guardian's Relation.
                                        </div>
                                    </div>
                                    
                                    <!--<div class="col-6 mb-3">
                                        <label for="validationGuardianIncome" class="form-label"> Guardian's Income <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="guardian_income" id="validationGuardianIncome" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please Enter Your Guardian's Income.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationGuardianNid" class="form-label"> Guardian's NID <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control" name="guardian_nid" id="validationGuardianNid" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please Enter Your Guardian's NID.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationGuardianDob" class="form-label"> Guardian's Date Of Birth <span class="rq">&nbsp;</span></label>
                                        <input type="text" class="form-control datepicker" name="guardian_dob" id="validationGuardianDob" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please Enter Your Guardian's Date Of Birth.
                                        </div>
                                    </div>-->
                                    
                                    <div class="col-6 mb-3">
                                        <label for="validationGuardianMobile" class="form-label"> Guardian Mobile <span class="rq">&nbsp;*</span></label>
                                        <input type="tel" class="form-control" name="guardian_mobile" id="validationGuardianMobile" autocomplete="off" required >
                                        <div class="invalid-feedback">
                                            Please Enter Your Guardian Mobile.
                                        </div>
                                    </div>

                                    <div class="hr_style">&nbsp;</div>

                                    <div class="col-6 mb-3">
                                        <label for="validationPresentAddress" class="form-label"> Present Address <span class="rq">&nbsp;*</span></label>
                                        <textarea class="form-control" name="present_address" rows="4" id="validationPresentAddress" required ></textarea>
                                        <div class="invalid-feedback">
                                            Please Enter Your Present Address.
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="validationPermanentAddress" class="form-label"> Permanent Address <span class="rq">&nbsp;*</span></label>
                                        <textarea class="form-control" name="permanent_address" rows="4" id="validationPermanentAddress" required ></textarea>
                                        <div class="invalid-feedback">
                                            Please Enter Your Permanent Address.
                                        </div>
                                    </div>

                                    <div class="col-4 mb-3">
                                        <label for="validationNationality" class="form-label">Nationality <span class="rq">&nbsp;*</span></label>
                                        <select id="validationNationality" name="nationality" class="form-control selectpicker" data-live-search="true" required>
                                            <option selected> Select Nationality </option>
                                            <option value="Bangladeshi">Bangladeshi</option>
                                            <option value="Other">Other</option>
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
                                            <option value="{{$division->name}}">{{$division->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Your Division.
                                        </div>
                                    </div>
        
                                    <div class="col-4">
                                        <label for="validationDistrict" class="form-label">District<span class="rq">&nbsp;*</span></label>
                                        <select id="validationDistrict" name="district" class="form-control selectpicker" data-live-search="true" required>
                                            <option selected> Select District </option>
                                            @foreach($districts as $key => $district)
                                                <option value="{{ $district->name }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Your District.
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="validationUpazila" class="form-label">Upazila <span class="rq">&nbsp;*</span></label>
                                        <select id="validationUpazila" name="upazila" class="form-control selectpicker" data-live-search="true" required>
                                            <option selected> Select Upazila </option>
                                            @foreach($upazilas as $key => $upazila)
                                                <option value="{{ $upazila->name }}">{{ $upazila->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Your Upazila.
                                        </div>
                                    </div>
                                    
                                    <div class="col-4">
                                        <label for="validationVill" class="form-label"> Vill/Area/Road <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="area" id="validationVill" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Vill/Area/Road
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
        									<option value="{{ $session }}">{{ $session }}</option>
        									@endfor
                                        </select>
                                        
                                        <div class="invalid-feedback">
                                            Please Enter Your Session.
                                        </div>
                                    </div>
                                    <!--<div class="col-4 mb-3">
                                        <label for="validationRoll" class="form-label"> Roll <span class="rq">&nbsp;*</span></label>
                                        <input type="text" class="form-control" name="hsc_roll" id="validationRoll" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Roll.
                                        </div>
                                    </div>-->
                                    
                                    <div class="col-4 mb-3">
                                        <label for="validationGroup" class="form-label">Group <span class="rq">&nbsp;*</span></label>
                                        <select class="form-control selectpicker" name="hsc_group" id="validationGroup" data-live-search="true" required>
                                            <option selected> Select Group </option>
                                            <option value="others">Others</option>
                                            <option value="science">Science</option>
                                            <option value="huminities">Huminities</option>
                                            <option value="business_studies">Business Studies</option>
                                        </select>
                                        
                                        <div class="invalid-feedback">
                                            Please Enter Your Group.
                                        </div>
                                    </div>
                                    
                                    <!--<div class="col-4 mb-3">
                                        <label for="validationClass" class="form-label">Class <span class="rq"> &nbsp;*</span></label>
                                        <select class="form-control selectpicker" name="hsc_class" id="validationClass" data-live-search="true" required>
                                            <option selected> Select Class </option>
                                            <option value="Eleven"> Eleven </option>
                                            <option value="Twelve"> Twelve </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Enter Your Class.
                                        </div>
                                    </div>-->
                                </div>
                                <div class="hr_style">&nbsp;</div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <label class="col-12 form-label">Select All Subject</label>
                                            <div class="col-3 mb-3">
                                                <select id="validationSubjectOne" class="form-control selectpicker" name="subject_one" data-live-search="true" required>
                                                    <option value="BANGLA" selected> BANGLA </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Enter Your HSC Subject One.
                                                </div>
                                            </div>

                                            <div class="col-3 mb-3">
                                                <select id="validationSubjectTwo" class="form-control selectpicker" name="subject_two" data-live-search="true" required>
                                                    <option value="ENGLISH" selected> ENGLISH </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Enter Your HSC Subject Two.
                                                </div>
                                            </div>

                                            <div class="col-3 mb-3">
                                                <select id="validationSubjectThree" class="form-control selectpicker" name="subject_three" data-live-search="true" required>
                                                    <option value="ICT" selected> ICT </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Enter Your HSC Subject Three.
                                                </div>
                                            </div>

                                            <div class="col-3 mb-3">
                                                <select id="validationSubjectfour" class="form-control selectpicker" name="subject_four" data-live-search="true" required>
                                                    <option value="PHYSICS"> PHYSICS </option>
                                                    <option value="CHEMISTRY"> CHEMISTRY </option>
                                                    <option value="ACCOUNTING"> ACCOUNTING </option>
                                                    <option value="BUSINESS_ORGANIZATION_AND_MANAGEMENT"> BUSINESS ORGANIZATION AND MANAGEMENT </option>
                                                    <option value="FINANCE_BANKING_AND_INSURANCE"> FINANCE BANKING AND INSURANCE </option>
                                                    <option value="ECONOMICS"> ECONOMICS </option>
                                                    <option value="HISTORY"> HISTORY </option>
                                                    <option value="ISLAMIC_HISTORY_AND_CULRURE"> ISLAMIC HISTORY AND CULRURE </option>
                                                    <option value="GEOGRAPHY"> GEOGRAPHY </option>
                                                    <option value="SOCIOLOGY"> SOCIOLOGY </option>
                                                    <option value="SOCIAL_WORK"> SOCIAL WORK </option>
                                                    <option value="LOGIC"> LOGIC </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Enter Your HSC Subject Four.
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <select id="validationSubjectFive" class="form-control selectpicker" name="subject_five" data-live-search="true" required>
                                                    <option value="PHYSICS"> PHYSICS </option>
                                                    <option value="CHEMISTRY"> CHEMISTRY </option>
                                                    <option value="ACCOUNTING"> ACCOUNTING </option>
                                                    <option value="BUSINESS_ORGANIZATION_AND_MANAGEMENT"> BUSINESS ORGANIZATION AND MANAGEMENT </option>
                                                    <option value="FINANCE_BANKING_AND_INSURANCE"> FINANCE BANKING AND INSURANCE </option>
                                                    <option value="ECONOMICS"> ECONOMICS </option>
                                                    <option value="HISTORY"> HISTORY </option>
                                                    <option value="ISLAMIC_HISTORY_AND_CULRURE"> ISLAMIC HISTORY AND CULRURE </option>
                                                    <option value="GEOGRAPHY"> GEOGRAPHY </option>
                                                    <option value="SOCIOLOGY"> SOCIOLOGY </option>
                                                    <option value="SOCIAL_WORK"> SOCIAL WORK </option>
                                                    <option value="LOGIC"> LOGIC </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Enter Your HSC Subject Five.
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <select id="validationSubjectSix" class="form-control selectpicker" name="subject_six" data-live-search="true" required>
                                                    <option selected>Select Elective Subject</option>
                                                    <option value="BIOLOGY"> BIOLOGY </option>
                                                    <option value="HIGHER MATHEMATICS"> HIGHER MATHEMATICS </option>
                                                    <option value="AGRICULTURE EDUCATION"> AGRICULTURE EDUCATION </option>
                                                    <option value="PSYCHOLOGY"> PSYCHOLOGY </option>
                                                    <option value="STATISTIES"> STATISTIES </option>
                                                    <option value="ECONOMICS"> ECONOMICS </option>
                                                    <option value="GEOGRAPHY"> GEOGRAPHY </option>
                                                    <option value="SOCIOLOGY"> SOCIOLOGY </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Enter Your HSC Subject Six.
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <select id="validationSubjectSeven" class="form-control selectpicker" name="subject_seven" data-live-search="true" required>
                                                    <option selected>Select Optional Subject</option>
                                                    <option value="BIOLOGY"> BIOLOGY </option>
                                                    <option value="HIGHER MATHEMATICS"> HIGHER MATHEMATICS </option>
                                                    <option value="AGRICULTURE EDUCATION"> AGRICULTURE EDUCATION </option>
                                                    <option value="PSYCHOLOGY"> PSYCHOLOGY </option>
                                                    <option value="STATISTIES"> STATISTIES </option>
                                                    <option value="ECONOMICS"> ECONOMICS </option>
                                                    <option value="GEOGRAPHY"> GEOGRAPHY </option>
                                                    <option value="SOCIOLOGY"> SOCIOLOGY </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Enter Your HSC Subject Seven.
                                                </div>
                                            </div>

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
                                        <label for="validationGuardianSign" class="form-label"> Father/Mother/Guardian Sign <span class="rq">&nbsp;*</span></label>
                                        <input class="form-control" name="guardian_sign" type="file" id="validationGuardianSign" required>
                                        <div class="invalid-feedback">
                                            Please Upload Father / Mother / Guardian Sign.
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
                    <div class="col-12">
                        <div class="row">
                            <footer class="secound_footer">
                                <div class="footer_info">
                                    <p>© Ananda Mohan College.</p>
                                    <p>Developed By: <a class="btn btn-link" href="freelanceitlab.com"> Freelance IT Lab</a></p>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- bootstrap js -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
        <!-- selectpicker js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <!-- datepicker js -->
		<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
		<script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
              'use strict'
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.querySelectorAll('.needs-validation')
              // Loop over them and prevent submission
              Array.prototype.slice.call(forms)
                .forEach(function (form) {
                  form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                      event.preventDefault()
                      event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                  },false)
                })
            })()

            // datepicker js
            $('.datepicker').each((key, tag)=>{
                $(tag).datepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'yyyy-mm-dd',
                });
            });
            $('.datepickerForm').datepicker({
                uiLibrary: 'bootstrap4'
            });
            $('.datepickerTo').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd',
            });
            $('#startDate').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd',
                // month/date/year
                minDate: '10/12/2020',
                maxDate: function () {
                    return $('#endDate').val();
                }
            });
            $('#endDate').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd',
                // month/date/year
                maxDate: '10/12/2024',
                minDate: function () {
                    return $('#startDate').val();
                }
            });

            // selectpicker
            $('.selectpicker').selectpicker();
        </script>
    </body>
</html>