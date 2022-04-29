<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['asideMenu']    = 'user';
        $data['asideSubmenu'] = 'all_user';

        $data['results'] = User::where('privilege', '!=', 'super')->get();

        return view('user.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['asideMenu']    = 'user';
        $data['asideSubmenu'] = 'add_user';
        
        $data['departmentList'] = Department::where('id', '!=', 1)->get();

        
        return view('user.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'privilege' => 'required',
            'username'  => 'required|unique:users|min:4',
            'password'  => 'required|confirmed|min:6'
        ]);
        
        if($request->privilege == 'user' && empty($request->department_id)){
            return redirect()->route('admin.user.create')->with(['warning' => 'If you are create user that you must select Department Field.']);
        }

        $data = new User;

        $data->name          = $request->name;
        $data->mobile        = $request->mobile;
        $data->email         = $request->email;
        $data->address       = $request->address;
        $data->privilege     = $request->privilege;
        $data->department_id = $request->department_id;
        $data->username      = $request->username;
        $data->password      = Hash::make($request->password);
        $data->avatar        = uploadFile($request->file('avatar'), 'public/uploads/user_image');

        $data->save();

        return redirect()->route('admin.user.create')->with(['success' => 'User successfully added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['asideMenu']    = 'user';
        $data['asideSubmenu'] = 'all_user';

        $data['departmentList'] = Department::where('id', '!=', 1)->get();

        $data['info'] = User::with('department')->where('id', $id)->first();

        return view('user.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = User::find($request->id);

        $data->name          = $request->name;
        $data->mobile        = $request->mobile;
        $data->email         = $request->email;
        $data->address       = $request->address;
        $data->department_id = $request->department_id;
        $data->privilege     = $request->privilege;

        if (!empty($request->file('avatar'))) {
            if (file_exists($data->avatar)) unlink($data->avatar);
            $data->avatar = uploadFile($request->file('avatar'), 'public/uploads/user_image');
        }

        $data->save();

        return redirect()->route('admin.user.show', $request->id)->with(['success' => 'User successfully updated.']);
    }

 
    /**
     * change password the specified resource in storage.
     */
    public function changePassword(Request $request)
    {

        $data = User::find($request->id);

        $this->validate($request, [
            'password' => 'required|confirmed|min:6'
        ]);

        if (!Hash::check($request->current_password, $data->password)) {
            return redirect()->route('admin.user.show', $request->id)->with(['warning' => 'Old password not match.']);
        }

        $data->password = Hash::make($request->password);

        $data->save();

        return redirect()->route('admin.user.show', $request->id)->with(['success' => 'Password change successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.user')->with(['delete' => 'User successfully deleted.']);
    }
}
