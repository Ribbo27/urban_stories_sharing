<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Text;

class File extends Model
{
	/**
     * Get the text that owns the file.
     */
	public function text()
	{
		return $this->belongsTo('App\Text');
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


	 /**
     * Get the location that owns the file.
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
