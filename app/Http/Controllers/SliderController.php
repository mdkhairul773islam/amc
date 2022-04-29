<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Slider;
use Illuminate\Http\Request;
use Auth;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // show all data
    public function index(Request $request)
    {
        $data['asideMenu']    = 'slider';
        $data['asideSubmenu'] = '';

        $data['departmentList'] = Department::whereNotIn('id', [1])->get();

        $where = [];

        if (!empty($request->type)) {
            $where[] = ['type', $request->type];
        }

        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        }
        
        
        if(Auth::user()->privilege == 'user'){
            $where[] = ['department_id', Auth::user()->department_id];
        }

        $data['results']  = Slider::with('department')->where($where)->orderBy('position', 'asc')->get();
        $data['position'] = (count($data['results']) + 1);

        return view('slider', $data);
    }

    /**
     * Store slider data
     */
    public function store(Request $request)
    {
        $data = new Slider();

        $data->type        = $request->type;
        $data->title       = $request->title;
        $data->url         = strSlug($request->title);
        $data->description = $request->description;
        $data->position    = $request->position;
        $data->link        = $request->link;

        if ($request->type == 'department') {
            $data->department_id = $request->department_id;
        }

        if ($request->file('avatar')) {
            $data->avatar = uploadFile($request->file('avatar'), 'public/uploads/slider');
        }

        $data->save();

        return redirect()->route('admin.slider')->with(['success' => 'Slider add successful.']);
    }

    /**
     * Get slider info in ajax request
     */
    public function edit(Request $request)
    {
        if (!empty($request->id)) {
            return Slider::where('id', $request->id)->first();
        }
    }

    /**
     * Update slider data
     */
    public function update(Request $request)
    {
        $data = Slider::find($request->id);

        $data->type        = $request->type;
        $data->title       = $request->title;
        $data->url         = strSlug($request->title);
        $data->description = $request->description;
        $data->link        = $request->link;
        $data->position    = $request->position;

        if ($request->type == 'department') {
            $data->department_id = $request->department_id;
        } else {
            $data->department_id = null;
        }

        if (!empty($request->file('avatar'))) {
            if (file_exists($data->avatar)) {
                unlink($data->avatar);
            }
            $data->avatar = uploadFile($request->file('avatar'), 'public/uploads/slider');
        }

        $data->save();

        return redirect()->route('admin.slider')->with(['update' => 'Slider update successful.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();

        return redirect()->route('admin.slider')->with(['delete' => 'Slider successfully deleted.']);
    }
}
