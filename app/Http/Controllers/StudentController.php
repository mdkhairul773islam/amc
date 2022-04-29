<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $data['asideMenu']    = 'student';
        $data['asideSubmenu'] = 'allStudent';
        
        $data['departmentList']  = Department::select('id', 'name')->get();
        
        
        $where = [];

        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        }
        
        if(Auth::user()->privilege == 'user'){
            $where[] = ['department_id', Auth::user()->department_id];
        }

        if (!empty($request->class)) {
            $where[] = ['class', $request->class];
        }

        if (!empty($request->session)) {
            $where[] = ['session', $request->session];
        }

        if (!empty($request->custom_id)) {
            $where[] = ['custom_id', $request->custom_id];
        }

        if (!empty($request->name)) {
            $where[] = ['name', $request->name];
        }

        if (!empty($request->student_mobile)) {
            $where[] = ['student_mobile', $request->student_mobile];
        }

        $data['results'] = Student::with('department')->where($where)->get();

        return view('student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['asideMenu']    = 'student';
        $data['asideSubmenu'] = 'addStudent';

        $data['departments'] = Department::all();

        return view('student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Student();

        $regId = rand(10000000, 99999999);
        while (Student::where('reg_id', $regId)->first()) {
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
        return redirect()->route('admin.student.create')->with(['success' => 'File successfully save.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['asideMenu']    = 'student';
        $data['asideSubmenu'] = 'allStudent';

        $data['info'] = Student::with('department')->where('id', $id)->first();

        return view('student.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'student';
        $data['asideSubmenu'] = 'allStudent';

        $data['departments'] = Department::all();
        $data['info']        = Student::with('department')->where('id', $id)->first();

        return view('student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = Student::with('department')->where('id', $request->id)->first();

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
        return redirect()->route('admin.student')->with(['update' => 'Student successfully save.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect()->route('admin.student')->with(['delete' => 'Student successfully deleted.']);
    }
}
