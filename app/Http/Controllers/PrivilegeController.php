<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['asideMenu'] = 'privilege';
        $data['asideSubmenu'] = '';

        return view('privilege',$data);
    }
}
