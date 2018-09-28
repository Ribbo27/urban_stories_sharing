<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

	/**
     * Get the files for the note.
     */
    public function file() {
    	return $this->hasMany('App\File');
    }

    /**
     * Get the texts for the note.
     */
    public function text() {
    	return $this->hasMany('App\Text');
    }
}
