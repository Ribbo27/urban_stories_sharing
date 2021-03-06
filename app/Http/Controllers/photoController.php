<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;	
use App\Photo;
use App\File;
use App\Location;
use App\Note;

class PhotoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Photo::All();
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
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $photo = new Photo;
        $file = new File;
        $location = new Location;
        $note = new Note;

        $filename = 'image-'.time().'.'.$request['format'];
        $fullPath = 'photos/'.$filename;

        $image_data = $request['image_data'];
       	$image_data = str_replace('data:image/gif;base64,', '', $image_data);
        $image_data = str_replace(' ', '+', $image_data);

        Storage::disk('local')->put($fullPath, base64_decode($image_data));

        $file->size = $request['size'];
        $file->format = $request['format'];
        $file->path = $fullPath;

        $photo->width = $request['width'];
        $photo->height = $request['height'];
        $photo->save();

        $location->latitude = $request['latitude'];
        $location->longitude = $request['longitude'];
        $location->save();
        $location->note()->save($note);

        $note->save();

        $note->file()->save($file);                   
        $photo->file()->save($file);                       
       
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
        if(Photo::find($id)){
            return Photo::find($id);
        }else {
            return Response(404);
        }
    }
}
