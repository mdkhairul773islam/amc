@extends('layouts.backend')
@section('content')
<!-- body container start -->
<div class="body_container">
    @include('student.nav')
    <!-- body content start -->
    <div class="body_content">
        <div class="panel_container">
            <div class="panel_heading">
                <h4>Add New Student</h4>
            </div>

            <div class="panel_body">
                <form action="{{route('admin.student.store')}}" enctype="multipart/form-data" method="POST">
					@csrf
					<div class="form-row">
					    @if(Auth::user()->privilege != 'user')
					    <div class="col-md-6">
							<label>Department <span class="text-danger">*</span></label>
							<div class="form-group">
								<select class="form-control" name="department_id" required>
									<option value="" selected>Select Department</option>
									@if(!empty($departments))
                                        @foreach($departments as $key => $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    @endif
								</select>
							</div>
						</div>
						@else
                        	<input type="hidden" name="department_id" value="{{Auth::user()->department_id}}">
                        @endif
						
						<div class="col-md-6">
							<label>Student ID <span class="text-danger">*</span></label>
							<div class="form-group">
								<input type="text" name="custom_id" class="form-control" required>
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Student Name <span class="text-danger">*</span></label>
							<div class="form-group">
								<input type="text" name="name" class="form-control" required>
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Student Mobile No. <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="student_mobile" class="form-control" >
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Student Email ID <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="email" name="email" class="form-control">
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Date of Birth <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="dob" placeholder="Date of Birth" class="form-control datepicker">
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Religion <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<select class="form-control" name="religion" required>
									<option value="" selected>Select Religion</option>
									<option value="Islam">Islam</option>
									<option value="Hinduism">Hinduism</option>
									<option value="Christian">Christian</option>
									<option value="Buddhism">Buddhism</option>
								</select>
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Gender <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<select class="form-control" name="gender" required>
									<option value="" selected>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Father's Name <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="father_name" class="form-control">
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Father's Profession <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="father_profession" class="form-control">
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Father's Mobile No. <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="father_mobile" class="form-control" >
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Mother's Name <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="mother_name" class="form-control">
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Mother's Profession <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="mother_profession" class="form-control">
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Mother's Mobile No. <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="mother_mobile" class="form-control" >
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Guardian's Name <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="guardian_name" class="form-control">
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Guardian's Profession <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="guardian_profession" class="form-control">
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Guardian's Mobile No. <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="guardian_mobile" class="form-control" >
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Class <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<select class="form-control" id="selectClass"  onchange="getYear()" name="class" required>
									<option value="" selected>Select Class</option>
									<option value="HSC">HSC</option>
									<option value="Honors">Honor's</option>
									<option value="Masters">Master's</option>
									<option value="Degree">Degree</option>
								</select>
							</div>
						</div>
						
						<div class="col-md-12">
							<label>Present Address <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<textarea name="present_address" rows="3" class="form-control"></textarea>
							</div>
						</div>
						
						<div class="col-md-12">
							<label>Permanent Address <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<textarea name="permanent_address" rows="3" class="form-control"></textarea>
							</div>
						</div>
						
						<div class="col-md-6">
							<label>Roll <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<input type="text" name="roll" class="form-control" >
							</div>
						</div>
                        <div class="col-md-6">
						    <div id="hsc">
                                <label>Year <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
    								<select class="form-control" name="hsc_year" required>
    									<option value="" selected>Select Year</option>
    									<option value="1st_year" >1st Year</option>
    									<option value="2nd_year" >2nd Year</option>
    								</select>
								</div>
                            </div>
					           
						    <div id="others">
                                <label>Year <span class="text-danger">&nbsp;</span></label>
                                <div class="form-group">
        							<select class="form-control" name="year" required>
        								<option value="" selected>Select Year</option>
        								@for ($i = date('Y')-2; $i < date('Y')+2; $i++)
        								<option value="{{ $i }}" >{{ $i }}</option>
                                        @endfor
        							</select>
    							</div>
                            </div>
						</div>
						
						<div class="col-md-6">
							<label>Session <span class="text-danger">&nbsp;</span></label>
							<div class="form-group">
								<select class="form-control" name="session" required>
									<option value="" selected>Select Session</option>
									@for ($i = date('Y')-2; $i < date('Y')+2; $i++)
									<?php $session = "$i-" . ($i + 1); ?>
									<option value="{{ $session }}">{{ $session }}</option>
									@endfor
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<label>Photo <span class="text-danger">&nbsp;</span></label>
								<div class="form-group">
								<input type="file" name="photo" class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group text-right">
								<button type="submit" class="btn submit_btn" name="save">Save</button>
							</div>
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
</script>
@endpush