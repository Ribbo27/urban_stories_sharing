<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Text;
use App\File;
use App\Location;


class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Text::All();
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

            $text = new Text;
            $file = new File;
            $location = new Location;

            $filename = 'text-'.time().'.txt';

            $content = $request['content'];

            //$path = Storage::disk('local')->put($filename, $content);
            //$path = Storage::disk('local')->putFile('files', $request->file('file'));

            //dd($path);

            $file->size = $request['size'];
            $file->format = $request['format'];
            $file->path = 'not file';

            $location->latitude = $request['latitude'];
            $location->longitude = $request['longitude'];

            $text->content = $content;
            $text->char_number = mb_strlen($content);     

            $text->save();
            $location->save();

            $location->file()->save($file);                   //Relazione tra Model File e Location
            $text->file()->save($file);                       //Relazione tra Model File e Text

            

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
        if(Text::find($id)){
            return Text::find($id);
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
        if(Text::find($id)){
            $text = Text::find($id);
            $text->content = $request['content'];
            $text->char_number = mb_strlen($request['content']);
            $text->save();

            return 202;
        }else{
            echo 'Error: ID not found';
            return 404;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        if(Text::find($id)) {
            Text::find($id)->delete();    

            echo 'Note succesfully deleted';                    //TODO Remove related row in File and Location model
            return 204;
        }else {
            echo 'Error: ID not found';
        }
               
    }

    public function showForm() 
    {
        return view('upload');
    }

}
