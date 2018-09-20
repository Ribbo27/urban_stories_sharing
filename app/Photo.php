<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	/**
     * Get the file record associated with the photo.
     */
    public function file() {
    	return $this->hasOne('App\File');
    }
}
