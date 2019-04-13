<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisiStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('disposisi_id');
            $table->unsignedInteger('pengirim_id');
            $table->unsignedInteger('penerima_id');
            $table->text('uraian');
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
        Schema::dropIfExists('disposisi_staff');
    }
}
