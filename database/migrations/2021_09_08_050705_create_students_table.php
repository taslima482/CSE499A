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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('sid')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->dateTime('dob')->nullable();

            $table->string('father_name')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_profession')->nullable();
            $table->text('siblings')->nullable();
            $table->text('aim_in_life')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('same_as_parmanent')->default(1);

            $table->string('reference_name')->nullable();
            $table->text('reference_profession')->nullable();
            $table->string('reference_phone')->nullable();

            $table->string('family_income')->nullable();
            $table->string('income_source')->nullable();
            $table->string('other_scholarship')->nullable();
            $table->text('reason')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
