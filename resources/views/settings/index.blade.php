@extends('layouts.backend')

@section('content')
<!-- body container start -->
<div class="body_container">

    <!-- body content start -->
    <div class="body_content">
        <div class="panel_container">
            <div class="panel_heading">
                <h4>General Settings</h4>
            </div>
            <div class="panel_body">
                <form action="{{route('admin.settings.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Site Name <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="text" name="setting[site_name]" value="{{(!empty($site_name) ? $site_name : '')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Mobile <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="text" name="setting[mobile]" value="{{(!empty($mobile) ? $mobile : '')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Email <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="text" name="setting[email]" value="{{(!empty($email) ? $email : '')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Youtube <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="text" name="setting[youtube]" value="{{(!empty($youtube) ? $youtube : '')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Facebook <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="text" name="setting[facebook]" value="{{(!empty($facebook) ? $facebook : '')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Twitter <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="text" name="setting[twitter]" value="{{(!empty($twitter) ? $twitter : '')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Address <span class="text-danger"></span></label>
                            <div class="form-group">
                                <textarea name="setting[address]" class="form-control">{{(!empty($address) ? $address : '')}}</textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label>Online HSC Admission Form <span class="text-danger"></span></label>
                            <div class="form-group">
                                <select class="form-control" name="setting[admission_form_hsc]" >
                                    <option value="no" {{(!empty($admission_form_hsc) && $admission_form_hsc =="no" ? "selected" : '')}} >No</option>
                                    <option value="yes" {{(!empty($admission_form_hsc) && $admission_form_hsc =="yes" ? "selected" : '')}} >Yes</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label>Online (Honors / Masters) Admission Form <span class="text-danger"></span></label>
                            <div class="form-group">
                                <select class="form-control" name="setting[admission_form]" >
                                    <option value="no" {{(!empty($admission_form) && $admission_form =="no" ? "selected" : '')}} >No</option>
                                    <option value="yes" {{(!empty($admission_form) && $admission_form =="yes" ? "selected" : '')}} >Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Online Result Publish <span class="text-danger"></span></label>
                            <div class="form-group">
                                <select class="form-control" name="setting[result_publish]" >
                                    <option value="no" {{(!empty($result_publish) && $result_publish =="no" ? "selected" : '')}} >No</option>
                                    <option value="yes" {{(!empty($result_publish) && $result_publish =="yes" ? "selected" : '')}} >Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            
                        </div>


                        <div class="col-md-6">
                            <label>Logo <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="file" name="logo" class="form-control">
                                @if(!empty($logo))
                                    <img src="{{asset($logo)}}" style="height: 80px; width: auto; max-width: 200px;" class="mt-1" alt="">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Favicon <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="file" name="favicon" class="form-control">
                                @if(!empty($favicon))
                                    <img src="{{asset($favicon)}}" style="height: 80px; width: auto; max-width: 200px;" class="mt-1" alt="">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Nav Logo <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="file" name="nav_logo" class="form-control">
                                @if(!empty($nav_logo))
                                    <img src="{{asset($nav_logo)}}" style="height: 80px; width: auto; max-width: 200px;" class="mt-1" alt="">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Copy Right <span class="text-danger"></span></label>
                            <div class="form-group">
                                <input type="text" name="setting[copy_right]" value="{{(!empty($copy_right) ? $copy_right : '')}}" class="form-control">
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
