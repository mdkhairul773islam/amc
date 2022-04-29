@extends('layouts.backend')

@section('content')
<!-- body container start -->
<div class="body_container">
    @include('sms.nav')
    
    <!-- body content start -->
    <div class="body_content">
        <div class="panel_container">
            <div class="panel_heading">
                <h4>Custom SMS</h4>
            </div>
            <div class="panel_body">
                <blockquote class="form_head">
                    <p>Total SMS: <strong>30000</strong> Total Send SMS: <strong>25520</strong> Remaining SMS: <strong>4480</strong></p>
                </blockquote>
                <hr class="mt-0 print_hide">
                <form action="#" method="POST">
                    <div class="form-row print_hide">
						<div class="col-md-6">
                            <div class="form-group">
								<select class="form-control selectpicker" name="showroom" data-live-search="true" required>
									<option value="" selected>Select Showroom</option>
									<option value="">Option One</option>
									<option value="">Option Two</option>
								</select>
							</div>
							<div class="form-group">
							    <textarea style="height: 152px;" class="form-control" name="mobile_number" placeholder="Without +88 And Use Comma(,) Separator" rows="4" required></textarea>
							</div>
						</div>
                        <div class="col-md-6">
                            <div class="form-group">
							    <textarea class="form-control" name="message" placeholder="Type Your Message. Maximum Characters Length 1080" rows="8" required></textarea>
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
        margin-bottom: 20px;
    }
    .form_head p {
        font-size: 16px;
        margin: 0;
    }
    .form_head strong {font-size: 15px;}
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
