<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubBagiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_bagians', function (Blueprint $table) {
            $table->string('kode_bagian')->primary();
            $table->string('kode_bagian_up');
            $table->string('nama_bagian');
            $table->unsignedBigInteger('user_id')->nullable();


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
        Schema::dropIfExists('sub_bagians');
    }
}
