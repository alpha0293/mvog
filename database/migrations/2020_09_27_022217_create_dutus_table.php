<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dutus', function (Blueprint $table) {
            $table->id();
            $table->string('profileimg')->nullable();
			$table->string('holyname');
            $table->string('fullname');
			$table->string('name');
			$table->date('dob');
			$table->string('parish');
			$table->string('school');
			$table->string('majors');
            $table->string('phonenumber');
			$table->unsignedBigInteger('idzone');
			$table->unsignedBigInteger('idyear');
			$table->unsignedBigInteger('idstatus');
            $table->unsignedBigInteger('check');
            $table->boolean('checklenlop')->nullable();
			$table->foreign('id')->references('id')->on('users');
			$table->foreign('idzone')->references('id')->on('zones');
			$table->foreign('idyear')->references('id')->on('years');
			$table->foreign('idstatus')->references('id')->on('statuses');
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
        Schema::dropIfExists('dutus');
    }
}
