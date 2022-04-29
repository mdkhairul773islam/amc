<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_admissions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('created')->nullable();
            $table->string('student_id', 55)->nullable()->index('student_id');
            $table->string('txn_id')->nullable();
            $table->string('security_code')->nullable();
            $table->string('form_no')->nullable();
            $table->string('esif_no')->nullable()->index('esif_no');
            $table->string('name_bn')->nullable();
            $table->string('name_en')->nullable();
            $table->string('birth_no')->nullable();
            $table->date('dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('quota')->nullable();
            $table->string('section')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('father_name_en')->nullable();
            $table->string('father_qualification')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('father_income')->nullable();
            $table->string('father_nid')->nullable();
            $table->date('father_dob')->nullable();
            $table->string('father_mobile')->nullable();
            $table->string('mother_name_bn')->nullable();
            $table->string('mother_name_en')->nullable();
            $table->string('mother_qualification')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('mother_income')->nullable();
            $table->string('mother_nid')->nullable();
            $table->date('mother_dob')->nullable();
            $table->string('mother_mobile')->nullable();
            $table->string('guardian_name_bn')->nullable();
            $table->string('guardian_name_en')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('guardian_profession')->nullable();
            $table->string('guardian_income')->nullable();
            $table->string('guardian_nid')->nullable();
            $table->date('guardian_dob')->nullable();
            $table->string('guardian_mobile')->nullable();
            $table->mediumText('present_address')->nullable();
            $table->mediumText('permanent_address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('upazila')->nullable();
            $table->string('area')->nullable();
            $table->string('ssc_regi_no')->nullable();
            $table->string('ssc_board_roll')->nullable();
            $table->string('ssc_board_name')->nullable();
            $table->string('ssc_passing_year')->nullable();
            $table->string('ssc_session')->nullable();
            $table->string('ssc_group')->nullable();
            $table->string('ssc_gpa')->nullable();
            $table->string('ssc_grade')->nullable();
            $table->string('ssc_institute')->nullable();
            $table->string('ssc_center')->nullable();
            $table->string('hsc_session')->nullable();
            $table->string('hsc_roll')->nullable();
            $table->string('hsc_section')->nullable();
            $table->string('hsc_group')->nullable();
            $table->string('hsc_class')->nullable();
            $table->string('subject_one')->nullable();
            $table->string('subject_two')->nullable();
            $table->string('subject_three')->nullable();
            $table->string('subject_four')->nullable();
            $table->string('subject_five')->nullable();
            $table->string('subject_six')->nullable();
            $table->string('subject_seven')->nullable();
            $table->string('department_class')->nullable();
            $table->string('department_roll')->nullable();
            $table->string('department_subject')->nullable();
            $table->string('department_session')->nullable();
            $table->string('exam_roll')->nullable();
            $table->string('merit_order')->nullable();
            $table->string('exam_group')->nullable();
            $table->text('passing_exam_name')->nullable();
            $table->text('passing_subject')->nullable();
            $table->text('passing_exam_center')->nullable();
            $table->text('passing_roll_no')->nullable();
            $table->text('passing_regi_no')->nullable();
            $table->text('passing_board')->nullable();
            $table->text('passing_year')->nullable();
            $table->text('passing_grade')->nullable();
            $table->text('passing_gpa')->nullable();
            $table->string('faculty_name')->nullable();
            $table->string('honors_subject')->nullable();
            $table->string('masters_subject')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->mediumText('student_photo')->nullable();
            $table->mediumText('student_sign')->nullable();
            $table->mediumText('guardian_sign')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('online_admissions');
    }
}
