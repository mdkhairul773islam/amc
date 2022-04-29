@extends('layouts.frontend')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>Image Gallery</h2>
                    <ul>
                        <li><a href="{{asset('/')}}">Home</a></li>
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->


    <!-- gallery section start -->
    <section class="gallery_section">
        <div class="container">

            @php($department = !empty($_GET['department']) ? $_GET['department'] : '')
            <?php
            if (!empty($department)) {
                $formAction = 'home/image-gallery?department=' . $department;
                $departmentList = $departmentList->whereIn('id', [1, strDecode($department)]);
            } else {
                $formAction = 'home/image-gallery';
            }
            ?>


            <form action="{{asset($formAction)}}" method="post" class="hidden">
                @csrf
                <div class="row">
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

                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn src_btn" name="show">Search</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                @if(!empty($results))
                    @foreach($results as $key =>  $row)
                        <div class="col-lg-4 col-sm-6">
                            <div class="gallery_content">
                                <div class="gallery_img">
                                    <img src="{{asset($row->avatar)}}" alt="">
                                    <a href="{{asset($row->avatar)}}" data-lightbox="image-1">
                                        <i class="icon ion-md-add"></i>
                                    </a>
                                </div>
                                <h5 class="gallery_title">{{(!empty($row->title) ? $row->title : 'N/A')}}</h5>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- gallery section end -->
@endsection

@push('header-style')
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/style/gallery.css">
@endpush

@push('footer-script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
@endpush
