<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('level')->nullable();
            $table->string('class_degree')->nullable();

            $table->string('institution')->nullable();
            $table->string('position')->nullable();
            $table->string('marks_cgpa')->nullable();
            $table->string('semester')->nullable();
            $table->string('year')->nullable();

            $table->string('ssc_year')->nullable();
            $table->string('ssc_institution')->nullable();
            $table->string('ssc_gpa')->nullable();
            $table->string('hsc_year')->nullable();
            $table->string('hsc_institution')->nullable();
            $table->string('hsc_gpa')->nullable();
            $table->string('bachelor_year')->nullable();
            $table->string('bachelor_institution')->nullable();
            $table->string('bachelor_subject')->nullable();
            $table->string('bachelor_cgpa')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degrees');
    }
}
