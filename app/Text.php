<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;

class Text extends Model
{
    
	protected $fillable = ['char_number', 'content'];

	protected $guarded = [];

    /**
     * Get the file record associated with the text.
     */
    public function note() {
    	return $this->belongsTo('App\Note');
    }
}
