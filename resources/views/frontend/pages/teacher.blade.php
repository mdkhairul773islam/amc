@extends('layouts.frontend')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>Teacher Page</h2>
                    <ul>
                        <li><a href="{{asset('/')}}">Home</a></li>
                        <li>Teacher</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    <!-- teacher section start -->
    <section class="teacher_section">
        <div class="container">

            @php($department = !empty($_GET['department']) ? $_GET['department'] : '')
            <?php
            if (!empty($department)) {
                $formAction = 'home/teacher?department=' . $department;
            } else {
                $formAction = 'home/teacher';
            }
            ?>
            <form action="{{asset($formAction)}}" method="post" class="hidden">
                @csrf
                <div class="row">
                    @if(empty($department))
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
                            <select class="form-control selectpicker" name="designation_id" data-live-search="true">
                                <option value="" selected>Select Designation</option>
                                @if(!empty($designationList))
                                    @foreach($designationList as $key => $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn src_btn" name="show">Search</button>
                        </div>
                    </div>
                </div>
            </form>


            <div class="row">
                @if(!empty($results))
                    @foreach($results as $key => $row)
                        <div class="col-lg-3 col-md-4">
                            <?php $url = 'home/teacher/profile/' . $row->id . (!empty($department) ? '?department=' . $department : ''); ?>
                            <a href="{{asset($url)}}" class="teacher_box">
                                <img src="{{asset($row->avatar)}}" alt="">
                                <h5>{{strFilter($row->name)}}</h5>
                                @if(!empty($row->designation))
                                    <p>{{$row->designation->name}}</p>
                                @endif
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- teacher page end -->

@endsection


@push('header-style')
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/style/teacher.css">
@endpush

@push('footer-script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
@endpush
