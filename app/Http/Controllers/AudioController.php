<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;	
use Illuminate\Validation\Validator;
use App\Audio;
use App\File;
use App\Location;
use App\Note;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Audio::All();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validazione dell'input
        $validatedData = $request->validate([
            'size' => 'required|numeric',
            'format' => 'required|alpha',
            'duration' => 'required|numeric',
            'bit_rate' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $audio = new Audio;
        $file = new File;
        $location = new Location;
        $note = new Note;

        $filename = 'audio-'.time().'.'.$request['format'];

        $audio_data = $request['audio_data'];
            
		$fullPath = 'audios/'.$filename;
        Storage::disk('local')->put($fullPath, base64_decode($audio_data));

        $file->size = $request['size'];
        $file->format = $request['format'];
        $file->path = $fullPath;

        $audio->duration = $request['duration'];
        $audio->bit_rate = $request['bit_rate'];
        $audio->save();

        $location->latitude = $request['latitude'];
        $location->longitude = $request['longitude'];
        $location->save();
        $location->note()->save($note);

        $note->save();

        $note->file()->save($file);                   
        $audio->file()->save($file);                       
            
        return Response(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Audio::find($id)){
            return Audio::find($id);
        }else {
            return Response(404);
        }
    }
}
