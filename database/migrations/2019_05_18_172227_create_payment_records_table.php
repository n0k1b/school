<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_records', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->bigInteger('school_id')->unsigned();
            
             $table->string('roll');
             $table->string('class');
             $table->string('section');
             $table->integer("total_amount");
             
             $table->integer("paid_amount");
             $table->boolean("payment_status");
             $table->string("payment_month");
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
        Schema::dropIfExists('payment_records');
    }
}
