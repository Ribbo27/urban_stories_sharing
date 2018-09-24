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

/* ---------------------------------
 *	API LAYER FOR TEXT NOTE
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all text notes
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		\api\textController@getTexts
 *  Method:			GET
 *  Description:	Gets all of the text notes in the app
*/
Route::get('/texts', 'textController@index');

/* ---------------------------------
 *	Get an individual text note
 *  ---------------------------------
 *  URL:			/api/texts/{id}
 *  Controller:		\api\textController@getText
 *  Method:			GET
 *  Description:	Gets an individual text note
*/
Route::get('/texts/{id}', 'textController@show');

/* ---------------------------------
 *	Add a new text note
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		\api\textController@postNewText
 *  Method:			POST
 *  Description:	Adds a new individual text note in the app
*/
Route::post('/texts', 'textController@store');

/* ---------------------------------
 *	Update an individual text note
 *  ---------------------------------
 *  URL:			/api/texts/{id}
 *  Controller:		\api\textController@putText
 *  Method:			PUT
 *  Description:	Upgrade an individual text note
*/
Route::put('/texts/{id}', 'textController@update');

/* ---------------------------------
 *	Delete all text notes
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		\api\textController@deleteTexts
 *  Method:			DELETE
 *  Description:	Delete all text notes in the app
*/
Route::delete('/texts/{id}', 'textController@destroy');

