<?php
namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Auth;

class TeacherController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $data['asideMenu']    = 'teacher';
        $data['asideSubmenu'] = 'allTeacher';
        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designationList'] = Designation::where('type', 'teacher')->select('id', 'name')->get();

        $where = [];

        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        }

        if(Auth::user()->privilege == 'user'){
            $where[] = ['department_id', Auth::user()->department_id];
        }

        if (!empty($request->designation_id)) {
            $where[] = ['designation_id', $request->designation_id];
        }

        $data['results'] = Teacher::with('department', 'designation')->where($where)->get();

        return view('teacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $data['asideMenu']    = 'teacher';
        $data['asideSubmenu'] = 'addTeacher';
        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designationList'] = Designation::where('type', 'teacher')->select('id', 'name')->get();

        return view('teacher.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = new Teacher();
        $data->joining_date   = $request->joining_date;
        $data->name           = $request->name;
        $data->mobile         = $request->mobile;
        $data->email          = $request->email;
        $data->nid            = $request->nid;
        $data->gender         = $request->gender;
        $data->department_id  = $request->department_id;
        $data->designation_id = $request->designation_id;
        $data->description    = $request->description;
        $data->avatar         = uploadFile($request->file('avatar'), 'public/uploads/teacher');
        $data->save();

        return redirect()->route('admin.teacher')->with(['success' => 'Teacher successfully save.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $data['asideMenu']    = 'teacher';
        $data['asideSubmenu'] = 'allTeacher';
        $data['info'] = Teacher::with('department', 'designation')->where('id', $id)->first();

        return view('teacher.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $data['asideMenu']    = 'teacher';
        $data['asideSubmenu'] = 'allTeacher';
        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designationList'] = Designation::where('type', 'teacher')->select('id', 'name')->get();
        $data['info'] = Teacher::find($id);

        return view('teacher.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) {
        $data = Teacher::find($request->id);
        $data->joining_date   = $request->joining_date;
        $data->name           = $request->name;
        $data->mobile         = $request->mobile;
        $data->email          = $request->email;
        $data->nid            = $request->nid;
        $data->gender         = $request->gender;
        $data->department_id  = $request->department_id;
        $data->designation_id = $request->designation_id;
        $data->description    = $request->description;

        if (!empty($request->file('avatar'))) {

            if (file_exists($data->avatar)) {
                unlink($data->avatar);
            }

            $data->avatar = uploadFile($request->file('avatar'), 'public/uploads/teacher');
        }


        $data->save();

        return redirect()->route('admin.teacher')->with(['update' => 'Teacher successfully update.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        Teacher::find($id)->delete();

        return redirect()->route('admin.teacher')->with(['delete' => 'Teacher successfully deleted.']);
    }

    /**
     * Show all designation
     */
    public function designation() {
        $data['asideMenu']    = 'teacher';
        $data['asideSubmenu'] = 'allDesignation';
        $data['results'] = Designation::where('type', 'teacher')->get();

        return view('teacher.designation', $data);
    }

    /**
     * Store designation
     */
    public function designationStore(Request $request) {
        $data = new Designation();
        $data->type = 'teacher';
        $data->name = $request->designation;
        $data->save();

        return redirect()->route('admin.teacher.designation')->with(['success' => 'Designation successfully save.']);
    }

    /**
     * get designation in ajax request
     */
    public function designationEdit(Request $request) {
        if (!empty($request->id)) {
            return Designation::where('id', $request->id)->first();
        }
    }

    /**
     * Update designation
     */
    public function designationUpdate(Request $request) {
        $data = Designation::find($request->id);
        $data->name = $request->designation;
        $data->save();

        return redirect()->route('admin.teacher.designation')->with(['update' => 'Designation successfully updated.']);
    }

    /**
    * Designation destroy
    */
    public function designationDestroy($id) {
        Designation::find($id)->delete();

        return redirect()->route('admin.teacher.designation')->with(['delete' => 'Designation successfully deleted.']);
    }
}
