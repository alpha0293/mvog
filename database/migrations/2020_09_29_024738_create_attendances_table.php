<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iddutu');
            $table->string('month');
            $table->string('year');
            $table->integer('status');
            $table->string('note');
            $table->foreign('iddutu')->references('id')->on('dutus')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('iduser');
            $table->foreign('iduser')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->timestamps();
			//$table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
