<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use App\Text;
use App\Note;
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

        //Validazione dell'input
        $validatedData = $request->validate([
            'content' => 'required|alpha_num|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);    

        $text = new Text;
        $note = new Note;
        $location = new Location;

        $location->latitude = $request['latitude'];
        $location->longitude = $request['longitude'];
        $location->save();
        $location->note()->save($note);

        $text->content = $request['content'];
        $text->char_number = mb_strlen($request['content']);       

        $note->save();
        $note->text()->save($text);
            
        $text->save();

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
        if(Text::find($id)){
            return Text::find($id);
        }else {
            return Response(404);
        }
    }

}
