<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school_name');
            $table->string('school_email',100)->unique();
            $table->string('school_password');
            
            $table->string('school_address');
            $table->string('school_thana');
            $table->string('school_district');
            $table->string('school_post_code');
            $table->string('school_contact_no');
            $table->boolean('isApproved')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_lists');
    }
}
