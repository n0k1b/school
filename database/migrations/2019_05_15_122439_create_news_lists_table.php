<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->bigInteger('school_id')->unsigned();
             $table_>string("title");
             $table->string("news");

             $table->string("image")->nullable();
             $table->string("date");
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
        Schema::dropIfExists('news_lists');
    }
}
