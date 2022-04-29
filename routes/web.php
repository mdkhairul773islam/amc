<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('login', function () {
    return redirect()->route('admin.login');
});
Route::any('admin', function () {
    return redirect()->route('admin.dashboard');
});
Route::any('register', function () {
    return redirect()->route('admin.login');
});
Route::any('password/confirm', function () {
    return redirect()->route('admin.login');
});
Route::post('password/email', function () {
    return redirect()->route('admin.login');
});
Route::any('password/reset', function () {
    return redirect()->route('admin.login');
});


// Frontend routs
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('home')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::match(['get', 'post'], '/image-gallery', [App\Http\Controllers\HomeController::class, 'imageGallery'])->name('home.image-gallery');
    Route::match(['get', 'post'], '/video-gallery', [App\Http\Controllers\HomeController::class, 'videoGallery'])->name('home.video-gallery');
    Route::match(['get', 'post'], '/teacher', [App\Http\Controllers\HomeController::class, 'teacher'])->name('home.teacher');
    Route::get('teacher/profile/{id}', [App\Http\Controllers\HomeController::class, 'teacherProfile'])->name('home.teacher.profile');
    Route::match(['get', 'post'], '/staff', [App\Http\Controllers\HomeController::class, 'staff'])->name('home.staff');


    Route::get('/admission-form-hsc', [App\Http\Controllers\HomeController::class, 'hscAdmissionForm'])->name('home.admission-form-hsc');
    Route::post('/admission-hsc-store', [App\Http\Controllers\HomeController::class, 'hscAdmissionStore'])->name('home.admission-hsc-store');

    Route::get('/admission-form', [App\Http\Controllers\HomeController::class, 'admissionForm'])->name('home.admission-form');
    Route::post('/admission-store', [App\Http\Controllers\HomeController::class, 'admissionStore'])->name('home.admission-store');
    Route::get('/result-publish', [App\Http\Controllers\HomeController::class, 'resultPublish'])->name('home.result-publish');


    Route::get('/contact/{department_id?}/{page?}', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');
    Route::post('contact/store', [App\Http\Controllers\HomeController::class, 'storeMessage'])->name('home.contact.store');
    Route::get('page/{page}', [App\Http\Controllers\HomeController::class, 'pageInfo'])->name('home.page');
    Route::get('slider/{page}', [App\Http\Controllers\HomeController::class, 'sliderInfo'])->name('home.slider');
    Route::get('/department-list', [App\Http\Controllers\HomeController::class, 'departmentList'])->name('home.department-list');
    Route::get('department', [App\Http\Controllers\HomeController::class, 'departmentInfo'])->name('home.department');
    Route::get('about-department', [App\Http\Controllers\HomeController::class, 'aboutDepartment'])->name('home.about-department');
    Route::get('speech/{page}', [App\Http\Controllers\HomeController::class, 'speech'])->name('home.speech');

    Route::get('notice', [App\Http\Controllers\HomeController::class, 'notice'])->name('home.notice');
    Route::get('notice/show/{id}', [App\Http\Controllers\HomeController::class, 'noticeShow'])->name('home.notice.show');
    Route::get('notice-download/{id}', [App\Http\Controllers\HomeController::class, 'noticeDownload'])->name('home.notice-download');
    Route::match(['get', 'post'], 'news', [App\Http\Controllers\HomeController::class, 'news'])->name('home.news');
    Route::get('news/show/{id}', [App\Http\Controllers\HomeController::class, 'showNews'])->name('home.news.show');
});


Route::get('admin/login', [App\Http\Controllers\AccessController::class, 'index'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\AccessController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [App\Http\Controllers\AccessController::class, 'logout'])->name('admin.logout');

// Dashboard route
Route::prefix('admin/dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
});

// Media Route
Route::prefix('admin/media')->group(function () {
    Route::any('/image', [App\Http\Controllers\MediaController::class, 'image'])->name('admin.media.image');
    Route::any('/video', [App\Http\Controllers\MediaController::class, 'video'])->name('admin.media.video');
    Route::post('/store', [App\Http\Controllers\MediaController::class, 'store'])->name('admin.media.store');
    Route::post('/edit', [App\Http\Controllers\MediaController::class, 'edit'])->name('admin.media.edit');
    Route::post('/update', [App\Http\Controllers\MediaController::class, 'update'])->name('admin.media.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\MediaController::class, 'destroy'])->name('admin.media.destroy');
});

// Slider route
Route::prefix('admin/slider')->group(function () {
    Route::any('/', [App\Http\Controllers\SliderController::class, 'index'])->name('admin.slider');
    Route::post('/store', [App\Http\Controllers\SliderController::class, 'store'])->name('admin.slider.store');
    Route::post('/edit', [App\Http\Controllers\SliderController::class, 'edit'])->name('admin.slider.edit');
    Route::post('/update', [App\Http\Controllers\SliderController::class, 'update'])->name('admin.slider.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\SliderController::class, 'destroy'])->name('admin.slider.destroy');
});

// Department Route
Route::prefix('admin/department')->group(function () {
    Route::get('/', [App\Http\Controllers\DepartmentController::class, 'index'])->name('admin.department');
    Route::post('/store', [App\Http\Controllers\DepartmentController::class, 'store'])->name('admin.department.store');
    Route::post('/edit', [App\Http\Controllers\DepartmentController::class, 'edit'])->name('admin.department.edit');
    Route::post('/update', [App\Http\Controllers\DepartmentController::class, 'update'])->name('admin.department.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('admin.department.destroy');
});

// Notice Route
Route::prefix('admin/notice')->group(function () {
    Route::any('/', [App\Http\Controllers\NoticeController::class, 'index'])->name('admin.notice');
    Route::get('/create', [App\Http\Controllers\NoticeController::class, 'create'])->name('admin.notice.create');
    Route::post('/store', [App\Http\Controllers\NoticeController::class, 'store'])->name('admin.notice.store');
    Route::get('/edit/{id}', [App\Http\Controllers\NoticeController::class, 'edit'])->name('admin.notice.edit');
    Route::post('/update', [App\Http\Controllers\NoticeController::class, 'update'])->name('admin.notice.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\NoticeController::class, 'destroy'])->name('admin.notice.destroy');
});

// Speech route
Route::prefix('admin/speech')->group(function () {
    Route::get('/', [App\Http\Controllers\SpeechController::class, 'index'])->name('admin.speech');
    Route::get('/create', [App\Http\Controllers\SpeechController::class, 'create'])->name('admin.speech.create');
    Route::post('/store', [App\Http\Controllers\SpeechController::class, 'store'])->name('admin.speech.store');
    Route::get('/edit/{id}', [App\Http\Controllers\SpeechController::class, 'edit'])->name('admin.speech.edit');
    Route::post('/update', [App\Http\Controllers\SpeechController::class, 'update'])->name('admin.speech.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\SpeechController::class, 'destroy'])->name('admin.speech.destroy');
});

// Page route
Route::prefix('admin/page')->group(function () {
    Route::any('/', [App\Http\Controllers\PageController::class, 'index'])->name('admin.page');
    Route::get('/create', [App\Http\Controllers\PageController::class, 'create'])->name('admin.page.create');
    Route::post('/store', [App\Http\Controllers\PageController::class, 'store'])->name('admin.page.store');
    Route::get('/edit/{id}', [App\Http\Controllers\PageController::class, 'edit'])->name('admin.page.edit');
    Route::post('/update', [App\Http\Controllers\PageController::class, 'update'])->name('admin.page.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\PageController::class, 'destroy'])->name('admin.page.destroy');
});

// Post route
Route::prefix('admin/post')->group(function () {
    Route::any('/', [App\Http\Controllers\PostController::class, 'index'])->name('admin.post');
    Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('admin.post.create');
    Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('admin.post.store');
    Route::get('/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('admin.post.edit');
    Route::post('/update', [App\Http\Controllers\PostController::class, 'update'])->name('admin.post.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('admin.post.destroy');
});

// Teacher route
Route::prefix('admin/teacher')->group(function () {
    Route::any('/', [App\Http\Controllers\TeacherController::class, 'index'])->name('admin.teacher');
    Route::get('/create', [App\Http\Controllers\TeacherController::class, 'create'])->name('admin.teacher.create');
    Route::post('/store', [App\Http\Controllers\TeacherController::class, 'store'])->name('admin.teacher.store');
    Route::get('/edit/{id}', [App\Http\Controllers\TeacherController::class, 'edit'])->name('admin.teacher.edit');
    Route::post('/update', [App\Http\Controllers\TeacherController::class, 'update'])->name('admin.teacher.update');
    Route::get('/show/{id}', [App\Http\Controllers\TeacherController::class, 'show'])->name('admin.teacher.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\TeacherController::class, 'destroy'])->name('admin.teacher.destroy');

    Route::any('/designation', [App\Http\Controllers\TeacherController::class, 'designation'])->name('admin.teacher.designation');
    Route::post('/designation-store', [App\Http\Controllers\TeacherController::class, 'designationStore'])->name('admin.teacher.designation-store');
    Route::post('/designation-edit', [App\Http\Controllers\TeacherController::class, 'designationEdit'])->name('admin.teacher.designation-edit');
    Route::post('/designation-update', [App\Http\Controllers\TeacherController::class, 'designationUpdate'])->name('admin.teacher.designation-update');
    Route::get('/designation-destroy/{id}', [App\Http\Controllers\TeacherController::class, 'designationDestroy'])->name('admin.teacher.designation-destroy');
});

// Staff route
Route::prefix('admin/staff')->group(function () {
    Route::any('/', [App\Http\Controllers\StaffController::class, 'index'])->name('admin.staff');
    Route::get('/create', [App\Http\Controllers\StaffController::class, 'create'])->name('admin.staff.create');
    Route::post('/store', [App\Http\Controllers\StaffController::class, 'store'])->name('admin.staff.store');
    Route::get('/edit/{id}', [App\Http\Controllers\StaffController::class, 'edit'])->name('admin.staff.edit');
    Route::post('/update', [App\Http\Controllers\StaffController::class, 'update'])->name('admin.staff.update');
    Route::get('/show/{id}', [App\Http\Controllers\StaffController::class, 'show'])->name('admin.staff.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('admin.staff.destroy');

    Route::any('/designation', [App\Http\Controllers\StaffController::class, 'designation'])->name('admin.staff.designation');
    Route::post('/designation-store', [App\Http\Controllers\StaffController::class, 'designationStore'])->name('admin.staff.designation-store');
    Route::post('/designation-edit', [App\Http\Controllers\StaffController::class, 'designationEdit'])->name('admin.staff.designation-edit');
    Route::post('/designation-update', [App\Http\Controllers\StaffController::class, 'designationUpdate'])->name('admin.staff.designation-update');
    Route::get('/designation-destroy/{id}', [App\Http\Controllers\StaffController::class, 'designationDestroy'])->name('admin.staff.designation-destroy');
});

// Student route
Route::prefix('admin/student')->group(function () {
    Route::any('/', [App\Http\Controllers\StudentController::class, 'index'])->name('admin.student');
    Route::get('/create', [App\Http\Controllers\StudentController::class, 'create'])->name('admin.student.create');
    Route::post('/store', [App\Http\Controllers\StudentController::class, 'store'])->name('admin.student.store');
    Route::get('/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('admin.student.edit');
    Route::post('/update', [App\Http\Controllers\StudentController::class, 'update'])->name('admin.student.update');
    Route::get('/show/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('admin.student.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('admin.student.destroy');
});

// Online Admission route
Route::prefix('admin/online-admission')->group(function () {
    Route::any('/', [App\Http\Controllers\OnlineAdmissionController::class, 'index'])->name('admin.online-admission');
    Route::any('/honrs', [App\Http\Controllers\OnlineAdmissionController::class, 'honrs'])->name('admin.online-admission.honrs');
    Route::get('/edit/{id}', [App\Http\Controllers\OnlineAdmissionController::class, 'edit'])->name('admin.online-admission.edit');
    Route::post('/update', [App\Http\Controllers\OnlineAdmissionController::class, 'update'])->name('admin.online-admission.update');
    Route::get('/show/{id}', [App\Http\Controllers\OnlineAdmissionController::class, 'show'])->name('admin.online-admission.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\OnlineAdmissionController::class, 'destroy'])->name('admin.online-admission.destroy');
});

// Result route
Route::prefix('admin/result')->group(function () {
    Route::any('/subject', [App\Http\Controllers\ResultController::class, 'allSubject'])->name('admin.result.subject');
    Route::get('/subject-create', [App\Http\Controllers\ResultController::class, 'addSubject'])->name('admin.result.subject-create');
    Route::post('/subject-store', [App\Http\Controllers\ResultController::class, 'storeSubject'])->name('admin.result.subject-store');
    Route::get('/subject-edit/{id}', [App\Http\Controllers\ResultController::class, 'editSubject'])->name('admin.result.subject-edit');
    Route::post('/subject-update', [App\Http\Controllers\ResultController::class, 'updateSubject'])->name('admin.result.subject-update');
    Route::get('/subject-destroy/{id}', [App\Http\Controllers\ResultController::class, 'deleteSubject'])->name('admin.result.subject-destroy');
});

// Sms route
Route::prefix('admin/sms')->group(function () {
    Route::any('/', [App\Http\Controllers\SmsController::class, 'index'])->name('admin.sms');
    Route::any('/send_sms', [App\Http\Controllers\SmsController::class, 'send_sms'])->name('admin.sms.send_sms');
    Route::any('/custom_sms', [App\Http\Controllers\SmsController::class, 'custom_sms'])->name('admin.sms.custom_sms');
});

// User route
Route::prefix('admin/user')->group(function () {
    Route::any('/', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user');
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.user.create');
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.user.store');
    Route::get('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('admin.user.update');
    Route::post('/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('admin.user.change-password');
    Route::get('/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('admin.user.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.user.destroy');
});

// Frontend message
Route::prefix('admin/frontend-message')->group(function () {
    Route::get('/', [App\Http\Controllers\FrontendMessageController::class, 'index'])->name('admin.frontend-message');
    Route::post('/', [App\Http\Controllers\FrontendMessageController::class, 'index'])->name('admin.frontend-message');
    Route::get('/show/{id}', [App\Http\Controllers\FrontendMessageController::class, 'show'])->name('admin.frontend-message.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\FrontendMessageController::class, 'destroy'])->name('admin.frontend-message.destroy');
});

// Settings route
Route::prefix('admin/settings')->group(function () {
    Route::get('/', [App\Http\Controllers\SettingsController::class, 'index'])->name('admin.settings');
    Route::Post('/store', [App\Http\Controllers\SettingsController::class, 'store'])->name('admin.settings.store');
});

Route::any('admin/privilege', [App\Http\Controllers\PrivilegeController::class, 'index'])->name('admin.privilege');



