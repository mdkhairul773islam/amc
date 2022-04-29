<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data['asideMenu']    = 'department';
        $data['asideSubmenu'] = '';

        $data['results'] = Department::with('page')->get();

        return view('department', $data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $slug = strSlug($request->name);

        if (empty(Department::where('slug', $slug)->first())) {

            $date = new Department();

            $date->name = $request->name;
            $date->slug = $slug;

            $date->save();
            $message = ['success' => 'Department save successful.'];
        } else {
            $message = ['warning' => 'This department already exists.'];
        }

        return redirect()->route('admin.department')->with($message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request) {
        if (!empty($request->id)) {
            return Department::find($request->id);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) {
        $slug = strSlug($request->name);

        if (empty(Department::where('slug', $slug)->where('id', '!=', $request->id)->first())) {

            $date = Department::find($request->id);

            $date->name = $request->name;
            $date->slug = $slug;

            $date->save();
            $message = ['success' => 'Department update successful.'];
        } else {
            $message = ['warning' => 'This department already exists.'];
        }

        return redirect()->route('admin.department')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $data = Department::find($id);
        $data->delete();

        return redirect()->route('admin.department')->with(['delete' => 'Department successfully deleted.']);
    }
}
