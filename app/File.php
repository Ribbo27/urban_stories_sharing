<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Note;
use App\Audio;
use App\Photo;
use App\Video;

class File extends Model
{
	/**
     * Get the note that owns the file.
     */
    public function note()
    {
        return $this->belongsTo('App\Notes');
    }

	/**
     * Get the audio that owns the file.
     */
	public function audio()
	{
		return $this->belongsTo('App\Audio');
	}

	/**
     * Get the photo that owns the file.
     */
	public function photo()
	{
		return $this->belongsTo('App\Photo');
	}

	/**
     * Get the video that owns the file.
     */
	public function video()
	{
		return $this->belongsTo('App\Video');
	}

}
