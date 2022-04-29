@extends('layouts.backend')

@section('content')
<!-- body container start -->
<div class="body_container">
    <!-- body content start -->
    <div class="body_content">
        <div class="panel_container">
            <div class="panel_heading">
                <h4>Show All Student</h4>
                <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
            </div>
            <div class="panel_body">
                @include('components.print')
                
                <form action="{{route('admin.online-admission')}}" method="post" class="hidden">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
							<div class="form-group">
								<input type="text" name="custom_id" class="form-control" placeholder="Student Registration ID">
							</div>
						</div>
						
                        <div class="col-md-3">
							<div class="form-group">
							    <select name="name" class="form-control selectpicker" data-live-search="true">
                                    <option selected>Select Student Name</option>
                                    @foreach($AllName as $key => $row)
                                    <option value="{{ $row->name_en }}" >{{ $row->name_en }} - {{ $row->name_bn }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						
                        <div class="col-md-3">
							<div class="form-group">
								<input type="text" name="mobile" class="form-control" placeholder="Student Mobile No.">
							</div>
						</div>

                        <div class="col-md-3">
							<div class="form-group">
								<select class="form-control" name="class" >
									<option value="" selected>Select Class</option>
									<option value="Eleven">Eleven</option>
									<option value="Twelve">Twelve</option>
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
                                <th style="width: 40px;">Photo</th>
                                <th style="width: 160px;">Student Name</th>
                                <th style="width: 160px;">Father Name</th>
                                <!--<th style="width: 150px;">Mother</th>
                                <th style="width: 150px;">Guardian</th>-->
                                <th style="width: 100px;">Address</th>
                                <th style="width: 140px;">HSC</th>
                                <th class="text-right print_hide" style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!empty($results))
                                @foreach($results as $key => $row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img style="max-width: 50px; max-height: 50px;" src="{{ asset($row->student_photo) }}" alt="Photo Not Found!"></td>
                                    <td>
                                        <b>(Bangla):</b> {{ $row->name_bn }} <br>
                                        <b>(English):</b> {{ $row->name_en }}
                                    <td>
                                        <b>(Bangla):</b> {{ $row->father_name_bn }} <br>
                                        <b>(English):</b> {{ $row->father_name_en }}
                                    </td>
                                    <!--<td>
                                        <b>Mother (Bangla):</b> {{ $row->mother_name_bn }} <br>
                                        <b>Mother (English):</b> {{ $row->mother_name_en }} <br>
                                        <b>Mother Mobile :</b> {{ $row->mother_mobile }}
                                    </td>
                                    <td>
                                        <b>Guardian (Bangla):</b> {{ $row->guardian_name }} <br>
                                        <b>Relation:</b> {{ $row->guardian_relation }} <br>
                                        <b>Guardian Mobile :</b> {{ $row->guardian_mobile }}
                                    </td>-->
                                    <td>{{ $row->present_address }}</td>
                                    <td>
                                        <b>Class:</b> {{ $row->hsc_class }} <br>
                                        <b>Group:</b> {{ strFilter($row->hsc_group) }} <br>
                                        <!--<b>Session:</b> {{ $row->session }} <br>
                                        <b>Section:</b> {{ $row->hsc_section }} <br>-->
                                        <b>Roll:</b> {{ $row->hsc_roll }}
                                    </td>
                                    <td class="operation_btn text-right print_hide">
                                        <a href="{{route('admin.online-admission.show', $row->id)}}" class="view" title="View">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.online-admission.edit', $row->id)}}" class="edit" title="Edit">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin.online-admission.destroy', $row->id)}}" class="delete" title="Delete">
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
