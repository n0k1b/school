<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject_name');
            $table->string('class_name');
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
        Schema::dropIfExists('subject_lists');
    }
}
