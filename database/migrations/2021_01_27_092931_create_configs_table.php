<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('loichua');
            $table->unsignedBigInteger('timediemdanhlai');
            $table->unsignedBigInteger('tilevang');
            $table->unsignedBigInteger('diemxetquanam');
            $table->unsignedBigInteger('tuoithidcv');
            $table->string('logo');
            $table->string('banner');
            $table->longText('footer');
            $table->string('backgroundcolor');
            $table->string('barcolor');
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
        Schema::dropIfExists('configs');
    }
}
