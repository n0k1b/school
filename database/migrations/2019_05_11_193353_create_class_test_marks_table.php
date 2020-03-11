<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTestMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_test_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('school_id')->unsigned();
            $table->string('class');

            $table->string('section');

            $table->integer('student_roll');

            $table->string('subject');

            $table->string('class_test_name');
            $table->string('class_test_date');
            $table->string('full_marks');
            $table->string('obtaining_marks');
            $table->timestamps();
           
             $table->foreign('school_id')
      ->references('id')->on('school_lists')
      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_test_marks');
    }
}
