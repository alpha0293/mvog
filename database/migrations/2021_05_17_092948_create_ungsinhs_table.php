<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUngsinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ungsinhs', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('holyname');
            $table->string('fullname');
            $table->string('name');
            $table->date('dob');
            $table->string('parish');
            $table->integer('year');
            $table->string('phonenumber');
            $table->unique(['email','year']);
            $table->string('province');
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
        Schema::dropIfExists('ungsinhs');
    }
}
