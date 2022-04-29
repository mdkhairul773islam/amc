@extends('layouts.backend')

@section('content')
<!-- body container start -->
<div class="body_container">
    @include('student.nav')

    <!-- body content start -->
    <div class="body_content">
        <div class="panel_container">
            <div class="panel_heading">
                <h4>Show All Student</h4>
                <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
            </div>
            <div class="panel_body">
                @include('components.print')
                
                <form action="{{route('admin.student')}}" method="post" class="hidden">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
							<div class="form-group">
								<input type="text" name="custom_id" class="form-control" placeholder="Student ID">
							</div>
						</div>
						
                        <div class="col-md-3">
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Student Name">
							</div>
						</div>
						
                        <div class="col-md-3">
							<div class="form-group">
								<input type="text" name="student_mobile" class="form-control" placeholder="Student Mobile No.">
							</div>
						</div>
						
						@if(Auth::user()->privilege != 'user')
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control selectpicker" name="department_id" data-live-search="true">
                                    <option value="" selected>Select Department</option>
                                    @if(!empty($departmentList))
                                        @foreach($departmentList as $key => $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        @endif
                        
                        <div class="col-md-3">
							<div class="form-group">
								<select class="form-control" name="class" >
									<option value="" selected>Select Class</option>
									<option value="HSC">HSC</option>
									<option value="Honors">Honor's</option>
									<option value="Masters">Master's</option>
									<option value="Degree">Degree</option>
								</select>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<select class="form-control" name="session" >
									<option value="" selected>Select Session</option>
									@for ($i = date('Y')-2; $i < date('Y')+2; $i++)
									<?php $session = "$i-" . ($i + 1); ?>
									<option value="{{ $session }}">{{ $session }}</option>
									@endfor
								</select>
							</div>
						</div>


                        <div class="col-md-1">
                            <div class="form-group">
                                <button type="submit" class="btn submit_btn" name="show">Search</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr class="mt-0 border-primary">
                    
                <div class="table-responsive">
                    <table class="table table-bordered list-table" id="DataTable">
                        <thead>
                            <tr>
                                <th style="width: 10px;">SL</th>
                                <th style="width: 45px;">Photo</th>
                                <th style="width: 90px;">Student ID</th>
                                <th>Student Name</th>
                                <th>Department</th>
                                <th>Class</th>
                                <th style="width: 100px;">Session</th>
                                <th class="text-right print_hide" style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!empty($results))
                                @foreach($results as $key => $row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img style="max-width: 50px; max-height: 50px;" src="{{ asset($row->photo) }}" alt="Photo Not Found!"></td>
                                    <td>{{$row->custom_id}}</td>
                                    <td>
                                        <b>Name:</b> {{ $row->name }} <br>
                                        <b>Mobile :</b> {{ $row->student_mobile }}
                                    </td>
                                    <td>{{ (!empty($row->department) ? $row->department->name : 'N/A') }}</td>
                                    <td>{{ $row->class }}</td>
                                    <td>{{ $row->session }}</td>
                                    <td class="operation_btn text-right print_hide">
                                        <a href="{{route('admin.student.show', $row->id)}}" class="view" title="View">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.student.edit', $row->id)}}" class="edit" title="Edit">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin.student.destroy', $row->id)}}" class="delete" title="Delete">
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
