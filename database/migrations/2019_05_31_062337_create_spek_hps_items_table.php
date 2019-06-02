<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpekHpsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spek_hps_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('spek_id');
            $table->string('nama_item');
            $table->unsignedInteger('volume');
            $table->string('satuan');
            $table->unsignedInteger('harga')->nullable();
            $table->unsignedInteger('jumlah')->nullable();
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
        Schema::dropIfExists('spek_hps_items');
    }
}
