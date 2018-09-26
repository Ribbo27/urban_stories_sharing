<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;	
use Intervention\Image\ImageManager;
use App\Photo;
use App\File;
use App\Location;

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

        if ($request->all() !== "") {

            $photo = new Photo;
            $file = new File;
            $location = new Location;

            $filename = 'image-'.time().'.png';

            $image_data = $request['image-data'];
       		$image_data = str_replace('data:image/gif;base64,', '', $image_data);
        	$image_data = str_replace(' ', '+', $image_data);

			Storage::disk('public')->put($filename, base64_decode($image_data));

            $file->size = $request['size'];
            $file->format = $request['format'];
            $file->path = 'not file';

            $photo->width = $request['width'];
            $photo->height = $request['height'];

            $location->latitude = $request['latitude'];
            $location->longitude = $request['longitude'];

            $photo->save();
            $location->save();

            $location->file()->save($file);                   //Relazione tra Model File e Location
            $photo->file()->save($file);                       //Relazione tra Model File e Text

            

            return 'file salvato!';
        }else{
            return 'Invalid parameters';    
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
        if(Photo::find($id)){
            return Photo::find($id);
        }else {
            return 'Error: ID not found';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
		//TODO        
    }
}
