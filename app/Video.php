<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Get the file record associated with the video.
     */
    public function file() {
    	return $this->hasOne('App\File');
    }
}
