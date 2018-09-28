<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Note;

class Location extends Model
{
    /**
     * Get the files for the location.
     */
    public function note()
    {
        return $this->hasMany('App\Note');
    }
}
