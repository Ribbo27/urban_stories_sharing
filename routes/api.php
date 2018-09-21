<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->get('/user', function (Request $request) {
    return \App\Text::all();
});

Route::post('/files', function (Request $request) {
	//Salvataggio file in param
	$param = $request->file('file');

	//Putfile ritorno il path e lo salvo in $path e salvo il file in locale
	$path = Storage::disk('local')->putFile('files', $param);	
	$file = new File;
	
	//Aggiorno il record path del file appena creato
	$file->path = $path;								
	$file->format = $param->getClientMimeType();		
	$file->size = $param->getClientSize();

	$file->save();										//Inserimento riga database
});

Route::get('/files/{id}', function (Request $request, int $id) {
	$file = File::find($id);
	$content = Storage::disk('local')->get($file->path);
	return $content;	
});

Route::resource('test', 'test');
