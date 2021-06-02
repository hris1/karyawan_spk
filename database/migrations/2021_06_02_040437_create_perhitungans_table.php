<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerhitungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('karyawan_id');
            $table->integer('k1_sebelum');
            $table->integer('k2_sebelum');
            $table->integer('k3_sebelum');
            $table->integer('k4_sebelum');
            $table->integer('k5_sebelum');
            $table->float('k1_sesudah');
            $table->float('k2_sesudah');
            $table->float('k3_sesudah');
            $table->float('k4_sesudah');
            $table->float('k5_sesudah');
            $table->float('total');
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
        Schema::dropIfExists('perhitungans');
    }
}
