@extends('layouts.frontend')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>News Page</h2>
                    <ul>
                        <li><a href="{{asset('/')}}">Home</a></li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->



    <!-- news section start -->
    <section class="news_section">
        <div class="container">
            @php($department = !empty($_GET['department']) ? $_GET['department'] : '')
            <?php
            if (!empty($department)) {
                $formAction     = 'home/news?department=' . $department;
                $departmentList = $departmentList->whereIn('id', ['1', strDecode($department)]);
            } else {
                $formAction = 'home/news';
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
                    @foreach($results as $row)
                        <div class="col-lg-4 col-md-6">
                            <div class="news_content">
                                <figure class="news_summary">
                                    <img src="{{asset($row->featured_image)}}" alt="">
                                </figure>

                                <div class="news_article">
                                    <div class="date">
                                        <h2>{{date('d', strtotime($row->created))}}</h2>
                                        <p>{{date('M', strtotime($row->created))}}</p>
                                    </div>
                                    @php($link = 'home/news/show/' . (!empty($department) ? $row->id . '?department=' . $department  : ''))
                                    <h4><a href="{{asset($link)}}">{{$row->title}}</a></h4>
                                    <?php $readMore = '<a href="' . asset($link) . '" class="read_more">Read More &rarr;</a>'; ?>
                                    {!! strLimit($row->description, 25, $readMore) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Pagination start here -->
            {{--<ul class="pagination">
                <li><a href="">Prev</a></li>
                <li><a href="">1</a></li>
                <li class="active"><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">Next</a></li>
            </ul>--}}
        </div>
    </section>
    <!-- news section end -->
@endsection

@push('header-style')
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/style/news.css">
@endpush

@push('footer-script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
@endpush
