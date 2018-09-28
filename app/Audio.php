<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
	protected $fillable = ['duration', 'bit_rate'];

	protected $guarded = [];

	protected $table = 'audios';
	
    /**
     * Get the file record associated with the audio.
     */
    public function file() {
    	return $this->hasOne('App\File');
    }
}
