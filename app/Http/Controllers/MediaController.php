<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Media;
use Illuminate\Http\Request;
use Auth;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all Image
     */
    public function image(Request $request)
    {
        $data['asideMenu']    = 'media';
        $data['asideSubmenu'] = 'imageGallery';

        $where   = [];
        $where[] = ['media_type', 'image'];
        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        }
        
        if(Auth::user()->privilege == 'user'){
            $where[] = ['department_id', Auth::user()->department_id];
        }

        if (!empty($request->status)) {
            $where[] = ['status', $request->status];
        }

        $data['departmentList'] = Department::all();

        $data['results'] = Media::where($where)->get();

        return view('media.image', $data);
    }

    /**
     * Show all Image
     */
    public function video(Request $request)
    {
        $data['asideMenu']    = 'media';
        $data['asideSubmenu'] = 'videoGallery';
        
        $data['departmentList'] = Department::all();

        $where   = [];
        $where[] = ['media_type', 'video'];
        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        }
        
        if(Auth::user()->privilege == 'user'){
            $where[] = ['department_id', Auth::user()->department_id];
        }

        if (!empty($request->status)) {
            $where[] = ['status', $request->status];
        }

        $data['results'] = Media::where($where)->get();

        return view('media.video', $data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Media();

        $data->media_type    = $request->media_type;
        $data->department_id = $request->department_id;
        $data->title         = $request->title;
        $data->status        = $request->status;

        if ($request->media_type == 'image') {
            $data->avatar = uploadFile($request->file('avatar'), 'public/uploads/media-gallery');
        }

        if ($request->media_type == 'video') {
            $data->avatar = $request->avatar;
        }

        $data->save();

        $redirect = 'admin.media.' . $request->media_type;

        return redirect()->route($redirect)->with(['success' => 'File successfully save.']);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        if (!empty($request->id)) {
            return Media::find($request->id);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = Media::find($request->id);

        $data->department_id = $request->department_id;
        $data->title         = $request->title;
        $data->status        = $request->status;

        if ($request->media_type == 'video') {
            $data->avatar = $request->avatar;
        }

        if ($request->media_type == 'image' && !empty($request->file('avatar'))) {
            if (file_exists($data->avatar)) {
                unlink($data->avatar);
            }

            $data->avatar = uploadFile($request->file('avatar'), 'public/uploads/media-gallery');
        }

        $data->save();

        $redirect = 'admin.media.' . $request->media_type;

        return redirect()->route($redirect)->with(['update' => 'Update successful.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $info = Media::find($id);

        /*if (file_exists($info->avater)) {
             unlink($info->avater);
         }*/

        $redirect = 'admin.media.' . $info->media_type;

        $info->delete();

        return redirect()->route($redirect)->with(['danger' => 'File successfully delete.']);
    }
}
