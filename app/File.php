<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	 /**
     * Get the location that owns the file.
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
