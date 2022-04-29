<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Staff;
use App\Models\FrontendMessage;
use App\Models\Media;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Speech;
use App\Models\Teacher;
use App\Models\OnlineAdmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $data['sliders']     = Slider::where('type', 'home')->get();
        $data['noticeList']  = Notice::with('department')->where('department_id', 1)->select('id', 'created', 'title', 'slug', 'description', 'path')->orderBy('created', 'desc')->limit(10)->get();
        $data['postList']    = Post::where('status', 'publish')->where('department_id', 1)->select('id', 'created', 'title', 'description', 'url', 'featured_image')->orderBy('created', 'desc')->limit(10)->get();
        $data['welcomePage'] = Page::where('url', 'welcome-page')->select('title', 'description', 'url', 'featured_image')->first();

        $speechInfo                  = Speech::with('designation', 'department')->get();
        $data['principleSpeech']     = $speechInfo->where('designation.name', 'Principal')->first();
        $data['vicePrincipleSpeech'] = $speechInfo->where('designation.name', 'Vice Principal')->first();
        $data['departmentHeads']     = Teacher::with('designation', 'department')->where('designation_id', 8)->get();

        return view('home', $data);
    }

    /* show all pages */
    public function pageInfo($page = '')
    {
        $data['info'] = Page::where('url', $page)->select('title', 'description', 'url', 'featured_image')->first();
        if (!empty($page) && !empty($data['info'])) {
            return view('frontend.pages.single', $data);
        }

        return abort(404, 'Page not found');
    }


    /* show all slider */
    public function sliderInfo($page = '')
    {
        $data['info'] = Slider::where('url', $page)->select('title', 'description', 'url', 'link', 'avatar')->first();
        if (!empty($page) && !empty($data['info'])) {
            return view('frontend.pages.single', $data);
        }
        return abort(404, 'Page not found');
    }

    /* show all pages */
    public function departmentInfo(Request $request)
    {
        $departmentId = strDecode($request->department);

        $data['sliderList']  = Slider::where('department_id', $departmentId)->select('title', 'description', 'avatar')->get();
        $data['speechInfo']  = Speech::with('department')->where('department_id', $departmentId)->first();
        $data['teacherList'] = Teacher::with('designation', 'department')->where('department_id', $departmentId)->get();
        $data['newList']     = Post::with('department')->where('department_id', $departmentId)->where('status', 'publish')->orderBy('created', 'desc')->limit(6)->get();
        $data['pageInfo']    = Page::with('department')->where('department_id', $departmentId)->first();

        if (!empty($data['teacherList'])) {
            $data['departmentHead'] = $data['teacherList']->where('designation_id', 8)->first();
        }

        $data['departmentNav'] = true;

        if (!empty($departmentId) && !empty($data['pageInfo'])) {
            return view('frontend.pages.department', $data);
        }

        return abort(404, 'Page not found');
    }

    /* show about department */
    public function aboutDepartment(Request $request)
    {
        $departmentId     = strDecode($request->department);
        $data['pageInfo'] = Page::with('department')->where('department_id', $departmentId)->first();

        if (!empty($departmentId) && !empty($data['pageInfo'])) {
            return view('frontend.pages.about-department', $data);
        }

        return abort(404, 'Page not found');
    }

    /* teacher profile */
    public function teacherProfile($id)
    {
        $data['info'] = Teacher::with('designation', 'department')->find($id);
        if (!empty($data['info'])) {
            return view('frontend.pages.teacher-profile', $data);
        }
        return abort(404, 'Page not found');
    }

    /* show all notice */
    public function notice(Request $request)
    {
        $where  = [];
        $active = '';

        if (!empty($request->search)) {
            $active  = strDecode($request->search);
            $where[] = ['department_id', strDecode($request->search)];
        } else {
            $departmentId = strDecode($request->department);
            if (!empty($departmentId)) {
                $active  = $departmentId;
                $where[] = ['department_id', $departmentId];
            }
        }

        $data['active'] = $active;

        $data['departmentList'] = DB::select('SELECT departments.id, departments.name, IFNULL(COUNT(*), 0) AS total_post FROM notices LEFT JOIN departments ON notices.department_id=departments.id WHERE notices.deleted_at IS NULL GROUP BY notices.department_id');

        $data['results'] = Notice::with('department')->where($where)->orderBy('created', 'desc')->get();

        return view('frontend.pages.notice', $data);
    }

    /* show single notice */
    public function noticeShow($id = null)
    {
        $department = !empty($_GET['department']) ? $_GET['department'] : '';

        $where = [];
        if (!empty($department)) {
            $where[] = ['department_id', strDecode($department)];
        }

        $data['noticeList'] = Notice::with('department')->select('id', 'created', 'title', 'slug', 'description', 'path')->where($where)->orderBy('created', 'desc')->limit(10)->get();
        $data['info']       = Notice::with('department')->where('id', $id)->first();

        if (!empty($data['info'])) {
            return view('frontend.pages.single-notice', $data);
        }

        return view('frontend.pages.notice', $data);
    }

    /* department list */
    public function departmentList()
    {
        $data['departmentList'] = Department::with('page')->whereNotIn('id', [1])->get();

        return view('frontend.pages.department_list', $data);
    }

    /* download notice */
    public function noticeDownload($id)
    {
        $info = Notice::where('id', $id)->first();

        if (!empty($info)) {
            return Response::download($info->path);
        }

        return redirect()->route('home.notice')->with(['error' => 'This file not exists.']);
    }

    /* show all news and event */
    public function news(Request $request)
    {
        $data['departmentList'] = Department::select('id', 'name')->get();

        $where   = [];
        $where[] = ['status', 'publish'];
        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        } else {
            $departmentId = strDecode($request->department);
            if (!empty($departmentId)) {
                $where[] = ['department_id', $departmentId];
            }
        }

        $data['results'] = Post::with('department')->where($where)->select('id', 'created', 'title', 'description', 'url', 'featured_image')->get();

        return view('frontend.pages.news', $data);
    }

    /* show all news and event */
    public function showNews($id = '')
    {
        $data['info'] = Post::where('id', $id)->select('title', 'description', 'url', 'featured_image', 'path')->first();

        if (!empty($id) && !empty($data['info'])) {
            return view('frontend.pages.single-news', $data);
        }

        return abort(404, 'Page not found');
    }

    /* show all news and event */
    public function speech($page = '')
    {
        $data['info'] = Speech::with('designation', 'department')->where('slug', $page)->first();

        if (!empty($page) && !empty($data['info'])) {
            return view('frontend.pages.speech', $data);
        }
        return abort(404, 'Page not found');
    }

    public function imageGallery(Request $request)
    {

        $data['departmentList'] = Department::select('id', 'name')->get();

        $where = [
            ['media_type', 'image'],
            ['status', 'publish']
        ];

        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        } else {
            $departmentId = strDecode($request->department);
            if (!empty($departmentId)) {
                $where[] = ['department_id', $departmentId];
            }
        }

        $data['results'] = Media::where($where)->get();

        return view('frontend.pages.image', $data);
    }

    public function videoGallery(Request $request)
    {
        $data['departmentList'] = Department::select('id', 'name')->get();

        $where = [
            ['media_type', 'video'],
            ['status', 'publish']
        ];

        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        } else {
            $departmentId = strDecode($request->department);
            if (!empty($departmentId)) {
                $where[] = ['department_id', $departmentId];
            }
        }

        $data['results'] = Media::where($where)->get();

        return view('frontend.pages.video', $data);
    }

    public function staff(Request $request)
    {

        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designationList'] = Designation::select('id', 'name')->where('type', 'staff')->get();

        $where = [];
        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        }

        $departmentId = strDecode($request->department);
        if (!empty($departmentId)) {
            $where[] = ['department_id', $departmentId];
        }

        if (!empty($request->designation_id)) {
            $where[] = ['designation_id', $request->designation_id];
        }
        $data['results'] = Staff::with('designation')->where($where)->get();

        return view('frontend.pages.staff', $data);
    }

    public function teacher(Request $request)
    {
        $data['departmentList']  = Department::select('id', 'name')->get();
        $data['designationList'] = Designation::select('id', 'name')->where('type', 'teacher')->get();

        $where = [];
        if (!empty($request->department_id)) {
            $where[] = ['department_id', $request->department_id];
        }

        $departmentId = strDecode($request->department);
        if (!empty($departmentId)) {
            $where[] = ['department_id', $departmentId];
        }

        if (!empty($request->designation_id)) {
            $where[] = ['designation_id', $request->designation_id];
        }

        $data['results'] = Teacher::with('designation', 'department')->where($where)->get();

        return view('frontend.pages.teacher', $data);
    }

    public function hscAdmissionForm(Request $request)
    {
        $data['departmentList'] = Department::all();

        $data['cityCorporation'] = DB::table('city_corporation')->get();
        $data['pourashava']      = DB::table('pourashava')->get();
        $data['divisions']       = DB::table('divisions')->get();
        $data['districts']       = DB::table('districts')->get();
        $data['upazilas']        = DB::table('upazilas')->get();
        $data['unions']          = DB::table('unions')->get();


        return view('frontend.pages.admission-form-hsc', $data);
    }

    public function hscAdmissionStore(Request $request)
    {
        $data = new OnlineAdmission();

        $form_no = $request->form_no;
        while (OnlineAdmission::where('form_no', $form_no)->first()) {
            $form_no = $request->form_no;
        }

        $data->created           = date('Y-m-d');
        $data->txn_id            = $request->txn_id;
        $data->form_no           = $form_no;
        $data->hsc_roll          = $request->hsc_roll;
        $data->security_code     = $request->security_code;
        $data->ssc_board_name    = $request->ssc_board_name;
        $data->ssc_board_roll    = $request->ssc_board_roll;
        $data->ssc_gpa           = $request->ssc_gpa;
        $data->ssc_grade         = $request->ssc_grade;
        $data->ssc_group         = $request->ssc_group;
        $data->ssc_passing_year  = $request->ssc_passing_year;
        $data->ssc_regi_no       = $request->ssc_regi_no;
        $data->ssc_session       = $request->ssc_session;
        $data->name_bn           = $request->name_bn;
        $data->name_en           = $request->name_en;
        $data->esif_no           = $request->esif_no;
        $data->quota             = $request->quota;
        $data->birth_no          = $request->birth_no;
        $data->section           = $request->section;
        $data->dob               = $request->dob;
        $data->blood_group       = $request->blood_group;
        $data->gender            = $request->gender;
        $data->mobile            = $request->mobile;
        $data->email             = $request->email;
        $data->religion          = $request->religion;
        $data->marital_status    = $request->marital_status;
        $data->father_name_bn    = $request->father_name_bn;
        $data->father_name_en    = $request->father_name_en;
        $data->father_profession = $request->father_profession;
        $data->father_mobile     = $request->father_mobile;
        $data->mother_name_bn    = $request->mother_name_bn;
        $data->mother_name_en    = $request->mother_name_en;
        $data->mother_profession = $request->mother_profession;
        $data->mother_mobile     = $request->mother_mobile;
        $data->guardian_name_bn  = $request->guardian_name_bn;
        $data->guardian_name_en  = $request->guardian_name_en;
        $data->guardian_relation = $request->guardian_relation;
        $data->guardian_mobile   = $request->guardian_mobile;
        $data->present_address   = $request->present_address;
        $data->permanent_address = $request->permanent_address;
        $data->nationality       = $request->nationality;
        $data->division          = $request->division;
        $data->district          = $request->district;
        $data->upazila           = $request->upazila;
        $data->area              = $request->area;
        $data->hsc_session       = $request->hsc_session;
        $data->hsc_group         = $request->hsc_group;
        $data->subject_one       = $request->subject_one;
        $data->subject_two       = $request->subject_two;
        $data->subject_three     = $request->subject_three;
        $data->subject_four      = $request->subject_four;
        $data->subject_five      = $request->subject_five;
        $data->subject_six       = $request->subject_six;
        $data->subject_seven     = $request->subject_seven;
        $data->status            = 'Registered';
        $data->type              = 'hsc';


        if (!empty($request->file('student_photo'))) {
            $data->student_photo = uploadFile($request->file('student_photo'), 'public/uploads/student');
        }

        if (!empty($request->file('student_sign'))) {
            $data->student_sign = uploadFile($request->file('student_sign'), 'public/uploads/student');
        }

        if (!empty($request->file('guardian_sign'))) {
            $data->guardian_sign = uploadFile($request->file('guardian_sign'), 'public/uploads/student');
        }

        $data->save();
        return redirect()->route('home.admission-form-hsc')->with('success', 'Your Admission Form Successfully Submited.');
    }

    public function admissionForm(Request $request)
    {
        $data['departmentList'] = Department::all();

        $data['cityCorporation'] = DB::table('city_corporation')->get();
        $data['pourashava']      = DB::table('pourashava')->get();
        $data['divisions']       = DB::table('divisions')->get();
        $data['districts']       = DB::table('districts')->get();
        $data['upazilas']        = DB::table('upazilas')->get();
        $data['unions']          = DB::table('unions')->get();


        return view('frontend.pages.admission-form', $data);
    }

    public function admissionStore(Request $request)
    {
        $data = new OnlineAdmission();

        $form_no = $request->form_no;
        while (OnlineAdmission::where('form_no', $form_no)->first()) {
            $form_no = $request->form_no;
        }

        $data->created             = date('Y-m-d');
        $data->form_no             = $form_no;
        $data->department_class    = $request->department_class;
        $data->department_roll     = $request->department_roll;
        $data->department_subject  = $request->department_subject;
        $data->department_session  = $request->department_session;
        $data->exam_roll           = $request->exam_roll;
        $data->merit_order         = $request->merit_order;
        $data->exam_group          = $request->exam_group;
        $data->txn_id              = $request->txn_id;
        $data->quota               = $request->quota;
        $data->name_bn             = $request->name_bn;
        $data->name_en             = $request->name_en;
        $data->birth_no            = $request->birth_no;
        $data->dob                 = $request->dob;
        $data->blood_group         = $request->blood_group;
        $data->gender              = $request->gender;
        $data->mobile              = $request->mobile;
        $data->email               = $request->email;
        $data->religion            = $request->religion;
        $data->marital_status      = $request->marital_status;
        $data->father_name_bn      = $request->father_name_bn;
        $data->father_name_en      = $request->father_name_en;
        $data->father_profession   = $request->father_profession;
        $data->father_mobile       = $request->father_mobile;
        $data->mother_name_bn      = $request->mother_name_bn;
        $data->mother_name_en      = $request->mother_name_en;
        $data->mother_profession   = $request->mother_profession;
        $data->mother_mobile       = $request->mother_mobile;
        $data->guardian_name_bn    = $request->guardian_name_bn;
        $data->guardian_name_en    = $request->guardian_name_en;
        $data->guardian_relation   = $request->guardian_relation;
        $data->guardian_profession = $request->guardian_profession;
        $data->guardian_mobile     = $request->guardian_mobile;
        $data->present_address     = $request->present_address;
        $data->permanent_address   = $request->permanent_address;
        $data->nationality         = $request->nationality;
        $data->division            = $request->division;
        $data->district            = $request->district;
        $data->upazila             = $request->upazila;
        $data->area                = $request->area;
        $data->passing_exam_name   = json_encode($request->passing_exam_name);
        $data->passing_subject     = json_encode($request->passing_subject);
        $data->passing_exam_center = json_encode($request->passing_exam_center);
        $data->passing_roll_no     = json_encode($request->passing_roll_no);
        $data->passing_regi_no     = json_encode($request->passing_regi_no);
        $data->passing_board       = json_encode($request->passing_board);
        $data->passing_year        = json_encode($request->passing_year);
        $data->passing_grade       = json_encode($request->passing_grade);
        $data->passing_gpa         = json_encode($request->passing_gpa);
        $data->faculty_name        = $request->faculty_name;
        $data->honors_subject      = $request->honors_subject;
        $data->masters_subject     = $request->masters_subject;
        $data->status              = 'Registered';
        $data->type                = 'honrs';


        if (!empty($request->file('student_photo'))) {
            $data->student_photo = uploadFile($request->file('student_photo'), 'public/uploads/student');
        }

        if (!empty($request->file('student_sign'))) {
            $data->student_sign = uploadFile($request->file('student_sign'), 'public/uploads/student');
        }

        if (!empty($request->file('guardian_sign'))) {
            $data->guardian_sign = uploadFile($request->file('guardian_sign'), 'public/uploads/student');
        }

        $data->save();
        return redirect()->route('home.admission-form')->with('success', 'Your Admission Form Successfully Submited.');
    }

    public function resultPublish(Request $request)
    {

        $data['examName'] = DB::table('all_exam_name')->get();


        return view('frontend.pages.result-publish', $data);
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function storeMessage(Request $request)
    {
        if (!empty($request->_token)) {

            $contactData = new FrontendMessage();

            $fullName = '';
            if (!empty($request->first_name)) {
                $contactData->first_name = strip_tags($request->first_name);
                $fullName                .= strip_tags($request->first_name);
            }

            if (!empty($request->last_name)) {
                $contactData->last_name = strip_tags($request->last_name);
                $fullName               .= ' ' . strip_tags($request->last_name);
            }

            if (!empty($request->email)) {
                $contactData->email = $request->email;
            }

            $fullName = ($request->full_name ? $request->full_name : $fullName);

            $contactData->created     = date('Y-m-d');
            $contactData->full_name   = $fullName;
            $contactData->type        = $request->type;
            $contactData->mobile      = $request->mobile;
            $contactData->description = strip_tags($request->description);

            $contactData->save();

            return $request->type;
        }
        return 'error';
    }
}
