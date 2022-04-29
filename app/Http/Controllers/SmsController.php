<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SmsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $data['asideMenu'] = 'sms';
        $data['asideSubmenu'] = 'smsReport';

        return view('sms.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send_sms() {
        $data['asideMenu'] = 'sms';
        $data['asideSubmenu'] = 'sendSms';

        return view('sms.send_sms',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function custom_sms() {
        $data['asideMenu'] = 'sms';
        $data['asideSubmenu'] = 'customSms';

        return view('sms.custom_sms',$data);
    }
}
