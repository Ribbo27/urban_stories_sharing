<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * Get the files for the location.
     */
    public function file()
    {
        return $this->hasMany('App\File');
    }
}
