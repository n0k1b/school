<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->bigInteger('school_id')->unsigned();
            
             $table->string('roll');
             $table->string('class');
             $table->string('section');
              $table->string('fees_name');
             
              $table->string('paid_amount');
               $table->string('month');
                $table->string('date');
             
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
        Schema::dropIfExists('payments');
    }
}
