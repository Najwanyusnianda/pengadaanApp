<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('permintaan_id')->nullable();
            $table->unsignedInteger('ppk_id')->nullable();
            $table->unsignedInteger('pp_id')->nullable();
            $table->unsignedInteger('penyedia_id')->nullable();
            $table->unsignedBigInteger('total_hps')->nullable();
            $table->unsignedBigInteger('total_penawaran')->nullable();
            $table->unsignedBigInteger('total_negosiasi')->nullable();
            $table->string('paket_storage')->nullable();
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
        Schema::dropIfExists('pakets');
    }
}
