<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChungsinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chungsinhs', function (Blueprint $table) {
            $table->id();
            $table->string('tenthanh');
            $table->string('tengoi');
            $table->string('ho');
            $table->date('ngaysinh');
            $table->date('ngayvaodcv');
            $table->string('giaoxu');
            $table->string('nienkhoa');
            $table->string('khoa');
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
        Schema::dropIfExists('chungsinhs');
    }
}
