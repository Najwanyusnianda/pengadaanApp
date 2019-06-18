<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisiHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('from_id');
            $table->unsignedInteger('to_id');
            //$table->string('status');
            //$table->boolean('is_read');
            $table->unsignedInteger('disposisi_detail_id');
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
        Schema::dropIfExists('disposisi_headers');
    }
}
