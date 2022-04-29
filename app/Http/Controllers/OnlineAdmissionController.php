<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\OnlineAdmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\DB;

class OnlineAdmissionController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $data['asideMenu']    = 'online-admission';
        $data['asideSubmenu'] = 'allOnlineStudentHsc';
        
        $data['AllName'] = OnlineAdmission::select('name_en','name_bn')->where('type', 'hsc')->get();
        

        $where = ['type' => 'hsc'];

        if (!empty($request->class)) {
            $where[] = ['hsc_class', $request->class];
        }

        if (!empty($request->session)) {
            $where[] = ['hsc_session', $request->session];
        }

        if (!empty($request->name)) {
            $where[] = ['name_en', $request->name];
        }

        if (!empty($request->student_mobile)) {
            $where[] = ['mobile', $request->mobile];
        }

        $data['results'] = OnlineAdmission::where($where)->get();
        
        //dd($data['results']);

        return view('online-admission.index', $data);
    }
    
    public function honrs(Request $request) {
        $data['asideMenu']    = 'online-admission';
        $data['asideSubmenu'] = 'allOnlineStudentHonrs';
        
        $data['AllName'] = OnlineAdmission::select('name_en','name_bn')->where('type', 'honrs')->get();
        

        $where = ['type'=>'honrs'];

        if (!empty($request->class)) {
            $where[] = ['hsc_class', $request->class];
        }

        if (!empty($request->session)) {
            $where[] = ['hsc_session', $request->session];
        }

        if (!empty($request->name)) {
            $where[] = ['name_en', $request->name];
        }

        if (!empty($request->student_mobile)) {
            $where[] = ['mobile', $request->mobile];
        }

        $data['results'] = OnlineAdmission::where($where)->get();
        
        //dd($data['results']);

        return view('online-admission.index', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $data['asideMenu']    = 'online-admission';
        $data['asideSubmenu'] = 'allOnlineStudent';

        $data['info'] = OnlineAdmission::where('id', $id)->first();

        return view('online-admission.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $data['asideMenu']    = 'online-admission';
        $data['asideSubmenu'] = 'allOnlineStudent';
        
        $data['cityCorporation'] = DB::table('city_corporation')->get();
        $data['pourashava']      = DB::table('pourashava')->get();
        $data['divisions']       = DB::table('divisions')->get();
        $data['districts']       = DB::table('districts')->get();
        $data['upazilas']        = DB::table('upazilas')->get();
        $data['unions']          = DB::table('unions')->get();

        $data['info'] = OnlineAdmission::where('id', $id)->first();

        return view('online-admission.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) {
        $data = OnlineAdmission::where('id', $request->id)->first();

        $data->student_id           = $request->student_id;
        $data->name_bn              = $request->name_bn;
        $data->name_en              = $request->name_en;
        $data->birth_no             = $request->birth_no;
        $data->dob                  = $request->dob;
        $data->blood_group          = $request->blood_group;
        $data->gender               = $request->gender;
        $data->mobile               = $request->mobile;
        $data->religion             = $request->religion;
        $data->marital_status       = $request->marital_status;
        
        $data->father_name_en       = $request->father_name_en;
        $data->father_name_bn       = $request->father_name_bn;
        $data->father_qualification = $request->father_qualification;
        $data->father_profession    = $request->father_profession;
        $data->father_income        = $request->father_income;
        $data->father_nid           = $request->father_nid;
        $data->father_dob           = $request->father_dob;
        $data->father_mobile        = $request->father_mobile;
        
        $data->mother_name_bn       = $request->mother_name_bn;
        $data->mother_name_en       = $request->mother_name_en;
        $data->mother_qualification = $request->mother_qualification;
        $data->mother_profession    = $request->mother_profession;
        $data->mother_income        = $request->mother_income;
        $data->mother_nid           = $request->mother_nid;
        $data->mother_dob           = $request->mother_dob;
        $data->mother_mobile        = $request->mother_mobile;
        
        $data->guardian_name        = $request->guardian_name;
        $data->guardian_relation    = $request->guardian_relation;
        $data->guardian_income      = $request->guardian_income;
        $data->guardian_nid         = $request->guardian_nid;
        $data->guardian_dob         = $request->guardian_dob;
        $data->guardian_mobile      = $request->guardian_mobile;
        
        $data->present_address      = $request->present_address;
        $data->permanent_address    = $request->permanent_address;
        $data->nationality          = $request->nationality;
        $data->division             = $request->division;
        $data->district             = $request->district;
        $data->upazila              = $request->upazila;
        
        $data->ssc_regi_no          = $request->ssc_regi_no;
        $data->ssc_board_roll       = $request->ssc_board_roll;
        $data->ssc_board_name       = $request->ssc_board_name;
        $data->ssc_passing_year     = $request->ssc_passing_year;
        $data->ssc_gpa              = $request->ssc_gpa;
        $data->ssc_grade            = $request->ssc_grade;
        $data->ssc_institute        = $request->ssc_institute;
        $data->ssc_center           = $request->ssc_center;
        
        $data->hsc_session          = $request->hsc_session;
        $data->hsc_class            = $request->hsc_class;
        $data->hsc_section          = $request->hsc_section;
        $data->hsc_roll             = $request->hsc_roll;
        $data->hsc_group            = $request->hsc_group;

        if (!empty($request->file('student_photo'))) {
            if (file_exists($data->student_photo)) {
                unlink($data->student_photo);
            }
            $data->student_photo = uploadFile($request->file('student_photo'), 'public/uploads/student');
        }

        if (!empty($request->file('student_sign'))) {
            if (file_exists($data->student_sign)) {
                unlink($data->student_sign);
            }
            $data->student_sign = uploadFile($request->file('student_sign'), 'public/uploads/student');
        }

        if (!empty($request->file('guardian_sign'))) {
            if (file_exists($data->guardian_sign)) {
                unlink($data->guardian_sign);
            }
            $data->guardian_sign = uploadFile($request->file('guardian_sign'), 'public/uploads/student');
        }

        $data->save();
        return redirect()->route('admin.online-admission')->with(['update' => 'Student successfully save.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $data = OnlineAdmission::find($id);
        $data->delete();
        return redirect()->route('admin.online-admission')->with(['delete' => 'Student successfully deleted.']);
    }
}
