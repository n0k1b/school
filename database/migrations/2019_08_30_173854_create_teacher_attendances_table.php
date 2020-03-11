<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('school_id')->unsigned();
             $table->bigInteger('teacher_id')->unsigned();


             $table->string('attendance_date');
             $table->boolean('present')->default(0);
             $table->boolean('status')->default(0);

            $table->timestamps();

              $table->foreign('school_id')
      ->references('id')->on('school_lists')
      ->onDelete('cascade');

          
              $table->foreign('teacher_id')
      ->references('id')->on('teachers')
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
        Schema::dropIfExists('teacher_attendances');
    }
}
