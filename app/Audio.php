<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    /**
     * Get the file record associated with the audio.
     */
    public function file() {
    	return $this->hasOne('App\File');
    }
}
