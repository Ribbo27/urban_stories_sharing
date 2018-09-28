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
            $table->mediumText('path')->nullable();
            $table->timestamps();
            $table->integer('note_id')->unsigned();
            $table->integer('photo_id')->unsigned()->nullable();
            $table->integer('audio_id')->unsigned()->nullable();
            $table->integer('video_id')->unsigned()->nullable();
            $table->foreign('note_id')->references('id')->on('notes');
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('audio_id')->references('id')->on('audios');
            $table->foreign('video_id')->references('id')->on('videos');
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
