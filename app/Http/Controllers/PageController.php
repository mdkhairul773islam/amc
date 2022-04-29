<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Page;
use Illuminate\Http\Request;
use Auth;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all data
     */
    public function index(Request $request)
    {
        $data['asideMenu']    = 'page';
        $data['asideSubmenu'] = 'allPage';

        $where = [];

        if (!empty($request->page_type)) {
            $where[] = ['type', $request->page_type];
        }
        
        if(Auth::user()->privilege == 'user'){
            $where[] = ['department_id', Auth::user()->department_id];
        }

        $data['results'] = Page::with('department')->where($where)->get();

        return view('page.index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data['asideMenu']    = 'page';
        $data['asideSubmenu'] = 'addPage';

        $data['departmentList'] = Department::select('id', 'name')->get();

        return view('page.create', $data);
    }

    /**
     * Store slider data
     */
    public function store(Request $request)
    {
        $pageUrl = strSlug($request->title);
        if (empty(Page::where('url', $pageUrl)->first())) {

            $data = new Page();

            $data->type          = $request->type;
            $data->department_id = $request->department_id;
            $data->title         = $request->title;
            $data->url           = $pageUrl;
            $data->description   = $request->description;

            if (!empty($request->file('featured_image'))) {
                $data->featured_image = uploadFile($request->file('featured_image'), 'public/uploads/featured_image');
            }

            $data->save();

            $message = ['success' => 'Page add successful.'];
        } else {
            $message = ['warning' => 'This page already exists.'];
        }

        return redirect()->route('admin.page')->with($message);
    }

    /**
     * Get slider info in ajax request
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'page';
        $data['asideSubmenu'] = 'allPage';

        $data['departmentList'] = Department::select('id', 'name')->get();

        $data['info'] = Page::find($id);

        return view('page.edit', $data);
    }

    /**
     * Update slider data
     */
    public function update(Request $request)
    {
        $data = Page::find($request->id);

        $pageUrl = strSlug($request->title);

        if (empty(Page::where('url', $pageUrl)->where('id', '!=', $request->id)->first())) {

            $data->type          = $request->type;
            $data->department_id = $request->department_id;
            $data->title         = $request->title;
            $data->url           = $pageUrl;
            $data->description   = $request->description;

            if (!empty($request->file('featured_image'))) {
                if (file_exists($data->featured_image)) unlink($data->featured_image);
                $data->featured_image = uploadFile($request->file('featured_image'), 'public/uploads/featured_image');
            }

            $data->save();

            $message = ['update' => 'Page update successful.'];
        } else {
            $message = ['warning' => 'This page already exists.'];
        }

        return redirect()->route('admin.page')->with($message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Page::find($id)->delete();

        return redirect()->route('admin.page')->with(['delete' => 'Page successfully deleted.']);
    }
}
