<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Show all data
     */
    public function index(Request $request) {
        $data['asideMenu']    = 'post';
        $data['asideSubmenu'] = 'allPost';

        $data['departmentList'] = Department::select('id', 'name')->get();

        $where = [];

        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        }
        
        if(Auth::user()->privilege == 'user'){
            $where[] = ['department_id', Auth::user()->department_id];
        }

        $data['results'] = Post::where($where)->get();

        return view('post.index', $data);
    }

    /**
     * Show create form
     */
    public function create() {
        $data['asideMenu']    = 'post';
        $data['asideSubmenu'] = 'addPost';

        $data['departmentList'] = Department::select('id', 'name')->get();

        return view('post.create', $data);
    }

    /**
     * Store slider data
     */
    public function store(Request $request) {
        $pageUrl = strSlug($request->title);
        if (empty(Post::where('url', $pageUrl)->first())) {

            $data = new Post();

            $data->department_id  = $request->department_id;
            $data->created        = $request->created;
            $data->title          = $request->title;
            $data->url            = $pageUrl;
            $data->description    = $request->description;
            $data->status         = $request->status;

            if (!empty($request->file('featured_image'))) {
                $data->featured_image = uploadFile($request->file('featured_image'), 'public/uploads/featured_image');
            }
            
            if (!empty($request->file('upload_file'))) {
                $data->path = uploadFile($request->file('upload_file'), 'public/uploads/files');
            }

            $data->save();

            $message = ['success' => 'Post add successful.'];
        } else {
            $message = ['warning' => 'This post already exists.'];
        }

        return redirect()->route('admin.post')->with($message);
    }

    /**
     * show edit form
     */
    public function edit($id) {
        $data['asideMenu']    = 'post';
        $data['asideSubmenu'] = 'allPost';

        $data['departmentList'] = Department::select('id', 'name')->get();

        $data['info'] = Post::find($id);

        return view('post.edit', $data);
    }

    /**
     * Update data
     */
    public function update(Request $request) {
        $data = Post::find($request->id);

        $pageUrl = strSlug($request->title);

        if (empty(Post::where('url', $pageUrl)->where('id', '!=', $request->id)->first())) {

            $data->department_id = $request->department_id;
            $data->created       = $request->created;
            $data->title         = $request->title;
            $data->url           = $pageUrl;
            $data->description   = $request->description;
            $data->status        = $request->status;

            if (!empty($request->file('featured_image'))) {
                if (file_exists($data->featured_image)) unlink($data->featured_image);
                $data->featured_image = uploadFile($request->file('featured_image'), 'public/uploads/featured_image');
            }
            
            if (!empty($request->file('upload_file'))) {
                if (file_exists($data->path)) unlink($data->path);
                $data->path = uploadFile($request->file('upload_file'), 'public/uploads/files');
            }

            $data->save();

            $message = ['update' => 'Post update successful.'];
        } else {
            $message = ['warning' => 'This post already exists.'];
        }
        return redirect()->route('admin.post')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        Post::find($id)->delete();
        return redirect()->route('admin.post')->with(['delete' => 'Post successfully deleted.']);
    }
}
