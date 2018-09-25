<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;

class Text extends Model
{
    
	protected $fillable = ['char_number'];

	protected $guarded = [];

    /**
     * Get the file record associated with the text.
     */
    public function file() {
    	return $this->hasOne('App\File');
    }
}
