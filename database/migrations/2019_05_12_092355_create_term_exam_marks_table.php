<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermExamMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_exam_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('school_id')->unsigned();
            $table->string("class");
            $table->string("section");
            $table->string("subject");
            $table->string("rollno");
            $table->string("exam_type");
            $table->integer('full_marks');
            $table->integer("obtaining_marks_subjective");
            $table->integer("obtaining_marks_objective");
            $table->integer("total_marks");
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
        Schema::dropIfExists('term_exam_marks');
    }
}
