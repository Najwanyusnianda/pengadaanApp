<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalKegiatanPengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kegiatan_pengadaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('paket_id');
            $table->unsignedInteger('kegiatan_id');
            $table->date('jadwal_kegiatan')->nullable();
            $table->string('nomor_kegiatan')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('jadwal_kegiatan_pengadaans');
    }
}
