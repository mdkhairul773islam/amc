<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Notice;
use Illuminate\Http\Request;
use Auth;

class NoticeController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $data['asideMenu']    = 'notice';
        $data['asideSubmenu'] = 'allNotice';

        $data['departmentList'] = Department::select('id', 'name')->get();

        $where = [];

        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        }
        
        if(Auth::user()->privilege == 'user'){
            $where[] = ['department_id', Auth::user()->department_id];
        }

        $data['results'] = Notice::with('department')->where($where)->orderBy('created', 'desc')->get();

        return view('notice.index', $data);
    }
    
    
    /**
     * Show create form
     */
    public function create() {
        $data['asideMenu']    = 'notice';
        $data['asideSubmenu'] = 'addNotice';

        $data['departmentList'] = Department::select('id', 'name')->get();

        return view('notice.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = new Notice();

        $data->created       = $request->created;
        $data->department_id = $request->department_id;
        $data->title         = $request->title;
        $data->slug          = strSlug($request->title);
        $data->description   = $request->description;

        if (!empty($request->file('path'))) {
            $data->path = uploadFile($request->file('path'), 'public/uploads/notice');
        }

        $data->save();

        return redirect()->route('admin.notice')->with(['success' => 'Notice save successful.']);
    }

    /**
     * show edit form
     */
    public function edit($id) {
        $data['asideMenu']    = 'notice';
        $data['asideSubmenu'] = 'allNotice';

        $data['departmentList'] = Department::select('id', 'name')->get();

        $data['info'] = Notice::find($id);

        return view('notice.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) {
        
        $data = Notice::find($request->id);

        $data->created       = $request->created;
        $data->department_id = $request->department_id;
        $data->title         = $request->title;
        $data->slug          = strSlug($request->title);
        $data->description   = $request->description;

        if (!empty($request->file('path'))) {
            if (file_exists($data->path)) unlink($data->path);
            $data->path = uploadFile($request->file('path'), 'public/uploads/notice');
        }

        $data->save();

        return redirect()->route('admin.notice')->with(['update' => 'Notice update successful.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $data = Notice::find($id);
        $data->delete();

        return redirect()->route('admin.notice')->with(['delete' => 'Notice successfully deleted.']);
    }
}
