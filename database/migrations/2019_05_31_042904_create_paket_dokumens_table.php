<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_dokumens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('paket_id');
            $table->string('subject')->nullable();
            $table->string('type')->nullable();
            $table->string('document_file')->nullable();
            $table->string('scanned_file')->nullable();
            $table->string('html_file')->nullable();
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
        Schema::dropIfExists('paket_dokumens');
    }
}
