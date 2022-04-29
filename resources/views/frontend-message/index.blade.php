@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Frontend Message</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">

                    <form action="{{route('admin.frontend-message')}}" method="post">
                        @csrf
                        <div class="row">
                            {{--<div class="col-md-3">
                                <div class="form-group">
                                    <select name="type" class="form-control">
                                        <option value="" selected> Message Type</option>
                                        <option value="contact">Contact</option>
                                        <option value="instant_contact">Instant Contact</option>
                                    </select>
                                </div>
                            </div>--}}

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="dateFrom" class="form-control datepicker"
                                           placeholder="Date form">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="dateTo" class="form-control datepicker"
                                           placeholder="Date to">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn submit_btn" name="search">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th style="width: 40px;">SL</th>
                                <th>Date</th>
                                <th>Message Type</th>
                                <th>Full Name</th>
                                <th>Description</th>
                                <th style="width: 120px;" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($results))
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->created}}</td>
                                        <td>{{strFilter($row->type)}}</td>
                                        <td>{{$row->full_name}}</td>
                                        <td>{{strLimit($row->description, 20)}}</td>

                                        <td class="operation_btn text-right print_hide">
                                            <a href="{{route('admin.frontend-message.show', $row->id)}}" target="_blank"
                                               class="view" title="View">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.frontend-message.destroy', $row->id)}}"
                                               onclick="return confirm('Do you want to delete this data?')"
                                               class="delete" title="Delete">
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
