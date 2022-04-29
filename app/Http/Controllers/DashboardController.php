<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $data['asideMenu'] = 'dashboard';
        $data['asideSubmenu'] = '';
        
        
        $data['designationWiseTeacherList'] = DB::select("SELECT designations.name, IFNULL(COUNT(*), 0) AS quantity FROM `teachers` LEFT JOIN designations ON teachers.designation_id=designations.id WHERE teachers.deleted_at IS NULL GROUP BY teachers.designation_id");
        
        
        return view('dashboard', $data);
    }
}
