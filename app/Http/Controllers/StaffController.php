<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $data['asideMenu']    = 'staff';
        $data['asideSubmenu'] = 'allStaff';
        
        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designationList'] = Designation::where('type', 'staff')->get();

        $where = [];
        if (!empty($request->designation_id)){
            $where[] = ['designation_id', $request->designation_id];
        }

        $data['results'] = Staff::with('designation', 'department')->where($where)->get();

        return view('staff.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $data['asideMenu']    = 'staff';
        $data['asideSubmenu'] = 'addStaff';

        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designation'] = Designation::where('type', 'staff')->get();

        return view('staff.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = new Staff();

        $data->joining_date   = $request->created;
        $data->name           = $request->name;
        $data->mobile         = $request->mobile;
        $data->email          = $request->email;
        $data->nid            = $request->nid;
        $data->address        = $request->address;
        $data->gender         = $request->gender;
        $data->designation_id = $request->designation_id;
        $data->department_id = $request->department_id;

        if (!empty($request->file('photo'))) {
            $data->avatar = uploadFile($request->file('photo'), 'public/uploads/staff');
        }

        $data->save();

        return redirect()->route('admin.staff.create')->with(['success' => 'File successfully save.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $data['asideMenu']    = 'staff';
        $data['asideSubmenu'] = 'allStaff';

        $data['info'] = Staff::with('designation', 'department')->where('id', $id)->first();

        return view('staff.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $data['asideMenu']    = 'staff';
        $data['asideSubmenu'] = 'allStaff';

        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designation'] = Designation::where('type', 'staff')->get();

        $data['info'] = Staff::where('id', $id)->first();

        return view('staff.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) {
        $data = Staff::where('id', $request->id)->first();

        $data->joining_date   = $request->created;
        $data->name           = $request->name;
        $data->mobile         = $request->mobile;
        $data->email          = $request->email;
        $data->nid            = $request->nid;
        $data->address        = $request->address;
        $data->gender         = $request->gender;
        $data->designation_id = $request->designation_id;
        $data->department_id = $request->department_id;

        if (!empty($request->file('photo'))) {
            if (file_exists($data->avatar)) {
                unlink($data->avatar);
            }
            
            $data->avatar = uploadFile($request->file('photo'), 'public/uploads/staff');
        }

        $data->save();

        return redirect()->route('admin.staff')->with(['update' => 'Staff successfully save.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $data = Staff::find($id);
        $data->delete();
        return redirect()->route('admin.staff')->with(['delete' => 'Staff successfully deleted.']);
    }


    /**
     * Show all designation
     */
    public function designation() {
        $data['asideMenu']    = 'staff';
        $data['asideSubmenu'] = 'allDesignation';

        $data['results'] = Designation::where('type', 'staff')->get();

        return view('staff.designation', $data);
    }


    /**
     * Store designation
     */
    public function designationStore(Request $request) {
        $data = new Designation();

        $data->type = 'staff';
        $data->name = $request->designation;

        $data->save();

        return redirect()->route('admin.staff.designation')->with(['success' => 'Designation successfully save.']);
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

        $data->type = 'staff';
        $data->name = $request->designation;

        $data->save();

        return redirect()->route('admin.staff.designation')->with(['update' => 'Designation successfully updated.']);
    }

    /**
     * Designation destroy
     */
    public function designationDestroy($id) {
        Designation::find($id)->delete();

        return redirect()->route('admin.staff.designation')->with(['delete' => 'Designation successfully deleted.']);
    }
}
