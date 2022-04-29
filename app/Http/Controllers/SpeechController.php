<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Speech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpeechController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all data
     */
    public function index()
    {
        $data['asideMenu']    = 'speech';
        $data['asideSubmenu'] = 'allSpeech';
        

        $data['results'] = Speech::with('designation', 'department')->get();

        return view('speech.index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data['asideMenu']    = 'speech';
        $data['asideSubmenu'] = 'addSpeech';

        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designationList'] = Designation::where('type', 'teacher')->select('id', 'name')->get();

        $data['employeeList'] = Employee::with('designation')->select('id', 'name', 'designation_id')->get();

        return view('speech.create', $data);
    }

    /**
     * Store slider data
     */
    public function store(Request $request)
    {
        $slug = strSlug($request->title) . '-' . floor(microtime(true));
        $data = new Speech();

        $data->name           = $request->name;
        $data->designation_id = $request->designation_id;
        $data->department_id  = $request->department_id;
        $data->slug           = $slug;
        $data->title          = $request->title;
        $data->description    = $request->description;
        $data->avatar         = uploadFile($request->file('avatar'), 'public/uploads/speech');

        $data->save();

        return redirect()->route('admin.speech')->with(['success' => 'Speech add successful.']);
    }

    /**
     * Get slider info in ajax request
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'speech';
        $data['asideSubmenu'] = 'allSpeech';

        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designationList'] = Designation::where('type', 'teacher')->select('id', 'name')->get();

        $data['employeeList'] = Employee::with('designation')->select('id', 'name', 'designation_id')->get();

        $data['info'] = Speech::find($id);

        return view('speech.edit', $data);
    }

    /**
     * Update slider data
     */
    public function update(Request $request)
    {
        $data = Speech::find($request->id);

        $slug = strSlug($request->title) . '-' . floor(microtime(true));

        $data->name           = $request->name;
        $data->department_id  = $request->department_id;
        $data->designation_id = $request->designation_id;
        $data->slug           = $slug;
        $data->title          = $request->title;
        $data->description    = $request->description;

        if (!empty($request->file('avatar'))) {
            if (file_exists($data->avatar)) {
                unlink($data->avatar);
            }
            $data->avatar = uploadFile($request->file('avatar'), 'public/uploads/speech');
        }

        $data->save();

        return redirect()->route('admin.speech')->with(['update' => 'Speech update successful.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Speech::find($id)->delete();

        return redirect()->route('admin.speech')->with(['delete' => 'Speech successfully deleted.']);
    }
}
