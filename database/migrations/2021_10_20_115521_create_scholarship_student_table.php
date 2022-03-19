<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_student', function (Blueprint $table) {
            $table->foreignId('student_id')->references('id')->on('students');
            $table->foreignId('scholarship_id')->references('id')->on('scholarships');
            $table->boolean('is_approve')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarship_student');
    }
}
