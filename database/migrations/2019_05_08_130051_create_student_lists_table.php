<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('roll_no');
            $table->string('class');
            $table->string('section');
            $table->string('contact_no');
            
            $table->bigInteger('school_id')->unsigned();
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
        Schema::dropIfExists('student_lists');
    }
}
