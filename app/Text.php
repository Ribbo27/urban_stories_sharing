<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
        /**
     * Get the file record associated with the text.
     */
    public function file() {
    	return $this->hasOne('App\File');
    }
}
