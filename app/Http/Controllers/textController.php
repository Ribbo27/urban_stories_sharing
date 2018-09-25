<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Text;
use App\File;

class textController extends Controller
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
        if ($request->hasFile('file')) {

            $filename = $request->file->getClientOriginalName();

            $path = $request->file->storeAs('public/uploadedText', $filename);

            $text = new Text;
            $file = new File;

            $file->size = $request->file->getClientSize();
            $file->format = $request->file->getClientMimeType();
            $file->path = $path;

            $text->char_number = 2;      //TODO: Recuperare char_number dal file in upload

            $text->save();
            $text->file()->save($file);

            

            return 'file salvato!';
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
        return Text::find($id);
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
        $text = Text::find($id);
        $text->char_number = $request->input('char_number');
        $text->save();

        return 202;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Text::find($id)->delete();

        return 204;
    }

    public function showForm() {
        return view('upload');
    }

}
