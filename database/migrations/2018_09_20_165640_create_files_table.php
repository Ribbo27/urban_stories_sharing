<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->primary('id');
            $table->float('size');
            $table->char('format', 3);
            $table->mediumText('path');
            $table->timestamps();
            $table->foreign('text_id')->references('id')->on('texts')->nullable();
            $table->foreign('photo_id')->references('id')->on('photos')->nullable();
            $table->foreign('audio_id')->references('id')->on('audios')->nullable();
            $table->foreign('video_id')->references('id')->on('videos')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->nullable($value = false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
