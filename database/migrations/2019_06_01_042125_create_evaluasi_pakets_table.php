<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluasiPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi_pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_paket');
            $table->unsignedInteger('id_kriteria');
            $table->boolean('status_evaluasi')->nullable();
            $table->boolean('hasil_evaluasi')->nullable();
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
        Schema::dropIfExists('evaluasi_pakets');
    }
}
