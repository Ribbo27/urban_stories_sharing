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
            $table->increments('id');
            $table->float('size');
            $table->text('format');
            $table->mediumText('path');
            $table->timestamps();
            $table->integer('text_id')->unsigned()->nullable();
            $table->integer('photo_id')->unsigned()->nullable();
            $table->integer('audio_id')->unsigned()->nullable();
            $table->integer('video_id')->unsigned()->nullable();
            $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('text_id')->references('id')->on('texts');
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('audio_id')->references('id')->on('audios');
            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('location_id')->references('id')->on('locations');
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
