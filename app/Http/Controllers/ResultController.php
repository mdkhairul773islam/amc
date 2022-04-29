<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class ResultController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $data['asideMenu']    = 'result';
        $data['asideSubmenu'] = '';

        return view('result.index', $data);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function addSubject(Request $request) {
        $data['asideMenu']    = 'result';
        $data['asideSubmenu'] = 'add-subject';

        return view('result.subject.create', $data);
    }
    /**
     * Display a listing of the resource.
     */
    public function storeSubject(Request $request) {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function allSubject(Request $request) {
        $data['asideMenu']    = 'result';
        $data['asideSubmenu'] = 'all-subject';

        return view('result.subject.all', $data);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function editSubject(Request $request) {
        $data['asideMenu']    = 'result';
        $data['asideSubmenu'] = 'all-subject';

        return view('result.subject.edit', $data);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function deleteSubject(Request $request) {
        $data = Subject::find($id);
        $data->delete();
        return redirect()->route('admin.result.all-subject')->with(['delete' => 'Subject successfully deleted.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $data['asideMenu']    = 'result';
        $data['asideSubmenu'] = '';

        $data['departments'] = Department::all();

        return view('result.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = new Result();

        $regId = rand(10000000, 99999999);
        while (Result::where('reg_id', $regId)->first()) {
            $regId = rand(10000000, 99999999);
        }

        $data->reg_id              = $regId;
        $data->created             = $request->created;
        $data->department_id       = $request->department_id;
        $data->custom_id           = $request->custom_id;
        $data->name                = $request->name;
        $data->student_mobile      = $request->student_mobile;
        $data->dob                 = $request->dob;
        $data->email               = $request->email;
        $data->religion            = $request->religion;
        $data->gender              = $request->gender;
        $data->father_name         = $request->father_name;
        $data->father_profession   = $request->father_profession;
        $data->father_mobile       = $request->father_mobile;
        $data->mother_name         = $request->mother_name;
        $data->mother_profession   = $request->mother_profession;
        $data->mother_mobile       = $request->mother_mobile;
        $data->guardian_name       = $request->guardian_name;
        $data->guardian_profession = $request->guardian_profession;
        $data->guardian_mobile     = $request->guardian_mobile;
        $data->present_address     = $request->present_address;
        $data->permanent_address   = $request->permanent_address;

        $data->username = $request->student_mobile;
        $data->password = Hash::make($request->student_mobile);
        $data->class    = $request->class;
        $data->roll     = $request->roll;
        $data->hsc_year = $request->hsc_year;
        $data->year     = $request->year;
        $data->session  = $request->session;

        if (!empty($request->file('photo'))) {
            $data->photo = uploadFile($request->file('photo'), 'public/uploads/student');
        }

        if (!empty($request->file('sign'))) {
            $data->sign = uploadFile($request->file('sign'), 'public/uploads/student');
        }
        $data->save();
        return redirect()->route('admin.result.create')->with(['success' => 'File successfully save.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $data['asideMenu']    = 'result';
        $data['asideSubmenu'] = '';

        $data['info'] = Result::with('department')->where('id', $id)->first();

        return view('result.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $data['asideMenu']    = 'result';
        $data['asideSubmenu'] = '';

        $data['departments'] = Department::all();
        $data['info']        = Result::with('department')->where('id', $id)->first();

        return view('result.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) {
        $data = Result::with('department')->where('id', $request->id)->first();

        $data->department_id       = $request->department_id;
        $data->custom_id           = $request->custom_id;
        $data->name                = $request->name;
        $data->student_mobile      = $request->student_mobile;
        $data->dob                 = $request->dob;
        $data->email               = $request->email;
        $data->religion            = $request->religion;
        $data->gender              = $request->gender;
        $data->father_name         = $request->father_name;
        $data->father_profession   = $request->father_profession;
        $data->father_mobile       = $request->father_mobile;
        $data->mother_name         = $request->mother_name;
        $data->mother_profession   = $request->mother_profession;
        $data->mother_mobile       = $request->mother_mobile;
        $data->guardian_name       = $request->guardian_name;
        $data->guardian_profession = $request->guardian_profession;
        $data->guardian_mobile     = $request->guardian_mobile;
        $data->present_address     = $request->present_address;
        $data->permanent_address   = $request->permanent_address;
        $data->class               = $request->class;
        $data->roll                = $request->roll;
        $data->hsc_year            = $request->hsc_year;
        $data->year                = $request->year;
        $data->session             = $request->session;

        if (!empty($request->file('photo'))) {
            if (file_exists($data->photo)) {
                unlink($data->photo);
            }
            $data->photo = uploadFile($request->file('photo'), 'public/uploads/student');
        }

        if (!empty($request->file('sign'))) {
            if (file_exists($data->sign)) {
                unlink($data->sign);
            }
            $data->sign = uploadFile($request->file('sign'), 'public/uploads/student');
        }

        $data->save();
        return redirect()->route('admin.result')->with(['update' => 'Student successfully save.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $data = Result::find($id);
        $data->delete();
        return redirect()->route('admin.result')->with(['delete' => 'Student successfully deleted.']);
    }
}
