@extends('layouts.backend')

@section('content')
<!-- body container start -->
<div class="body_container">
    @include('sms.nav')
    
    <!-- body content start -->
    <div class="body_content">
        <div class="panel_container">
            <div class="panel_heading">
                <h4>SMS Report</h4>
            </div>
            <div class="panel_body">
                <blockquote class="form_head">
                    <p>Total SMS: <strong>30000</strong> Total Send SMS: <strong>25520</strong> Remaining SMS: <strong>4480</strong></p>
                </blockquote>
                <form action="#" method="POST">
                    <div class="form-row print_hide">
						<div class="col-md-3">
                            <div class="form-group">
								<select class="form-control selectpicker" name="showroom" data-live-search="true" required>
									<option value="" selected>Select Showroom</option>
									<option value="">Option One</option>
									<option value="">Option Two</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="form" placeholder="Form" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="to" placeholder="To" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
								<button type="submit" class="btn submit_btn" name="show">Show</button>
							</div>
						</div>
                    </div>
                </form>
                <hr class="mt-0 print_hide">
                <div class="table-responsive">
                    <table class="table table-bordered list-table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Mobile Number</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Demo</td>
                                <td>Demo</td>
                                <td>Lorem Ipsum Dolor Seat, Ipsum Dolor Seat Ipsum Dolor Seat</td>
                            </tr>
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

@push('header-style')
<style>
    .form_head {
        border-left: 4px solid #303F9F;
        padding: 7px 0 7px 12px;
        margin-bottom: 20px;
    }
    .form_head p {
        font-size: 16px;
        margin: 0;
    }
    .form_head strong {font-size: 15px;}
</style>
@endpush