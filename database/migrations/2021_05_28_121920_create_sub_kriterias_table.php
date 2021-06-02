<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kriteria_id');
            $table->integer('nilai_min')->nullable();
            $table->integer('nilai_max')->nullable();
            $table->string('kategori')->nullable();
            $table->string('crips')->nullable();
            $table->integer('bobot');
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
        Schema::dropIfExists('sub_kriterias');
    }
}
