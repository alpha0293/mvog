<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperDutusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_dutus', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('iddutu');
			$table->unsignedBigInteger('idpaper');
			$table->string('url');
			$table->string('status');
			$table->foreign('iddutu')->references('id')->on('dutus');
			$table->foreign('idpaper')->references('id')->on('papers');
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
        Schema::dropIfExists('paper_dutus');
    }
}
