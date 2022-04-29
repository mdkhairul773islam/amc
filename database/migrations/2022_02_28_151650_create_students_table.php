<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('created')->nullable();
            $table->integer('reg_id')->nullable()->index('reg_id');
            $table->string('custom_id')->nullable();
            $table->integer('department_id')->nullable()->index('department_id');
            $table->string('name')->nullable();
            $table->string('student_mobile')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('father_mobile')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('mother_mobile')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_profession')->nullable();
            $table->string('guardian_mobile')->nullable();
            $table->text('email')->nullable();
            $table->date('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender')->nullable();
            $table->mediumText('present_address')->nullable();
            $table->mediumText('permanent_address')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('class')->nullable();
            $table->string('roll')->nullable();
            $table->string('session')->nullable();
            $table->string('hsc_year', 250)->nullable();
            $table->string('year')->nullable();
            $table->date('validity')->nullable();
            $table->string('pass_year')->nullable();
            $table->mediumText('photo')->nullable();
            $table->text('sign')->nullable();
            $table->string('status')->nullable()->default('admitted');
            $table->string('student_status')->nullable()->default('active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
