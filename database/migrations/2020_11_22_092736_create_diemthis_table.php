<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemthisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diemthis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iddutu');
            $table->unsignedBigInteger('idnam');
            $table->string('nam')->nullable();
            $table->decimal('diem',8,2);
            $table->foreign('iddutu')->references('id')->on('dutus');
            $table->foreign('idnam')->references('id')->on('years');
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
        Schema::dropIfExists('diemthis');
    }
}
