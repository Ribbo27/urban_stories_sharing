<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;	
use App\Video;
use App\File;
use App\Location;
use App\Note;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Video::All();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->all() !== "") {

            $video = new Video;
            $file = new File;
            $location = new Location;
            $note = new Note;

            $filename = 'video-'.time().'.'.$request['format'];
            $video_data = $request['video_data'];
			$fullPath = 'videos/'.$filename;
			
            Storage::disk('local')->put($fullPath, base64_decode($video_data));

            $file->size = $request['size'];
            $file->format = $request['format'];
            $file->path = $fullPath;

            $video->duration = $request['duration'];
            $video->width = $request['width'];
            $video->height = $request['height'];
            $video->bit_rate = $request['bit_rate'];
            $video->frame_rate = $request['frame_rate'];
            $video->save();

            $location->latitude = $request['latitude'];
            $location->longitude = $request['longitude'];
            $location->save();
            $location->note()->save($note);

            $note->save();

            $note->file()->save($file);                   
            $video->file()->save($file);                       

            

            return 'File video salvato!';
        }else{
            return 'Parametri non validi';    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Video::find($id)){
            return Video::find($id);
        }else {
            return 'Error: ID not found';
        }
    }
}
