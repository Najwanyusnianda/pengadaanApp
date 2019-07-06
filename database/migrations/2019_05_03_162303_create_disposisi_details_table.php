<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('source_id')->nullable();
            $table->text('konten');
            $table->text('konten_updated')->nullable();
            $table->string('type')->nullable();
            $table->unsignedInteger('permintaan_id');
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
        Schema::dropIfExists('disposisi_details');
    }
}
