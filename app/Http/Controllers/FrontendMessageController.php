<?php

namespace App\Http\Controllers;

use App\Models\FrontendMessage;
use Illuminate\Http\Request;

class FrontendMessageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['asideMenu']    = 'frontendMessage';
        $data['asideSubmenu'] = '';

        $where = [];
        if (!empty($request->_token)){

            if (!empty($request->type)){
                $where[] = ['type', $request->type];
            }

            if (!empty($request->dateFrom)){
                $where[] = ['created', '>=', $request->dateFrom];
            }

            if (!empty($request->dateTo)){
                $where[] = ['created', '<=', $request->dateTo];
            }

        }else{
            $where[] = ['created', date('Y-m-d')];
        }

        $where[] = ['type', 'contact'];

        $data['results'] = FrontendMessage::where($where)->get();

        return view('frontend-message.index', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['asideMenu']    = 'frontendMessage';
        $data['asideSubmenu'] = '';

        $data['info'] = FrontendMessage::find($id);

        return view('frontend-message.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        FrontendMessage::find($id)->delete();

        return redirect()->route('admin.frontend-message')->with(['delete' => 'Message successfully deleted.']);
    }
}
