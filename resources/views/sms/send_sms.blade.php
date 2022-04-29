@extends('layouts.backend')

@section('content')
<!-- body container start -->
<div class="body_container">
    @include('sms.nav')
    
    <!-- body content start -->
    <div class="body_content">
        <div class="panel_container">
            <div class="panel_heading">
                <h4>Send SMS</h4>
            </div>
            <div class="panel_body">
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
								<select class="form-control selectpicker" name="client_type" data-live-search="true" required>
									<option value="" selected>Client Type</option>
                                    <option value="supplier">Supplier</option>
                                    <option value="dealer">Dealer</option>
								</select>
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
                <blockquote class="form_head">
                    <p>Total SMS: <strong>30000</strong> Total Send SMS: <strong>25520</strong> Remaining SMS: <strong>4480</strong></p>
                </blockquote>
                <hr class="mt-0 print_hide">
                <form action="#" method="POST">
                    <div class="form-row print_hide">
						<div class="col-md-12">
                            <div class="form-group">
								<select class="form-control selectpicker" name="showroom" data-live-search="true" required>
									<option value="" selected>Select Showroom</option>
									<option value="">Option One</option>
									<option value="">Option Two</option>
								</select>
							</div>
							<div class="form_table">
							    <table class="table table-bordered">
							        <tr>
							            <th>Name</th>
							            <th>Mobile</th>
							            <th>Address</th>
							        </tr>
							        <tr>
							            <td>SOPNA CHIMICS- GACHABARI (3505)</td>
							            <td>
							                <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="check_1">
                                                <label class="form-check-label" for="check_1">01726951088</label>
                                            </div>
						                </td>
							            <td>গাছাবাড়ী, ২৫ মাইল, মধুপুর</td>
							        </tr>
							        <tr>
							            <td>SOPNA CHIMICS- GACHABARI (3505)</td>
							            <td>
							                <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="check_2">
                                                <label class="form-check-label" for="check_2">01726951088</label>
                                            </div>
						                </td>
							            <td>গাছাবাড়ী, ২৫ মাইল, মধুপুর</td>
							        </tr>
							        <tr>
							            <td>SOPNA CHIMICS- GACHABARI (3505)</td>
							            <td>
							                <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="check_3">
                                                <label class="form-check-label" for="check_3">01726951088</label>
                                            </div>
						                </td>
							            <td>গাছাবাড়ী, ২৫ মাইল, মধুপুর</td>
							        </tr>
							        <tr>
							            <td>SOPNA CHIMICS- GACHABARI (3505)</td>
							            <td>
							                <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="check_4">
                                                <label class="form-check-label" for="check_4">01726951088</label>
                                            </div>
						                </td>
							            <td>গাছাবাড়ী, ২৫ মাইল, মধুপুর</td>
							        </tr>
							        <tr>
							            <td>SOPNA CHIMICS- GACHABARI (3505)</td>
							            <td>
							                <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="check_5">
                                                <label class="form-check-label" for="check_5">01726951088</label>
                                            </div>
						                </td>
							            <td>গাছাবাড়ী, ২৫ মাইল, মধুপুর</td>
							        </tr>
							        <tr>
							            <td>SOPNA CHIMICS- GACHABARI (3505)</td>
							            <td>
							                <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="check_6">
                                                <label class="form-check-label" for="check_6">01726951088</label>
                                            </div>
						                </td>
							            <td>গাছাবাড়ী, ২৫ মাইল, মধুপুর</td>
							        </tr>
							        <tr>
							            <td>SOPNA CHIMICS- GACHABARI (3505)</td>
							            <td>
							                <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="check_7">
                                                <label class="form-check-label" for="check_7">01726951088</label>
                                            </div>
						                </td>
							            <td>গাছাবাড়ী, ২৫ মাইল, মধুপুর</td>
							        </tr>
							    </table>
							</div>
						</div>
                        <div class="col-md-12">
                            <div class="form-group">
							    <textarea class="form-control" name="message" placeholder="Type Your Message. Maximum Characters Length 1080" rows="6" required></textarea>
							</div>
						</div>
						<div class="col-md-12">
						    <div class="form-row">
						        <div class="col-md-6">
						            <div class="total_msg">
        							    <strong>Total Characters</strong> <input type="number" name="characters" readonly value="112"> <strong>Total Messages</strong> <input type="number" name="characters" readonly value="12">
        							</div>
						        </div>
						        <div class="col-md-6">
                                    <div class="form-group text-right">
        								<button type="submit" class="btn submit_btn" name="send_msg">Send SMS</button>
        							</div>
    							</div>
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


@push('header-style')
<style>
    .form_head {
        border-left: 4px solid #303F9F;
        padding: 7px 0 7px 12px;
        margin-bottom: 15px;
    }
    .form_head p {
        font-size: 16px;
        margin: 0;
    }
    .form_head strong {font-size: 15px;}
    .form_table .table {margin: 0;}
    .form_table .table td {font-size: 14px;}
    .form_table .form-group {
        user-select: none;
        margin: 0;
    }
    .form_table .form-group input {margin-top: 3px;}
    .form_table {
        border-bottom: 1px solid #d4d9de;
        border-top: 1px solid #d4d9de;
        margin-bottom: 20px;
        max-height: 220px;
        overflow: auto;
    }
    .total_msg {
        justify-content: flex-end;
        display: flex;
    }
    .total_msg strong {margin-left: 15px;}
    .total_msg input {
        box-shadow: none;
        border: none;
        width: 40px;
        padding: 0;
        outline: none;
        margin-left: 12px;
        text-align: right;
    }
</style>
@endpush