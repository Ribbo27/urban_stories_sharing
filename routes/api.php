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

/* ---------------------------------
 *	API LAYER FOR FILES
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all files
 *  ---------------------------------
 *  URL:			/api/files
 *  Controller:		fileController@index
 *  Method:			GET
 *  Description:	Gets all of the files in the app
*/
Route::get('/files', 'fileController@index');

/* ---------------------------------
 *	API LAYER FOR TEXT NOTE
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all text notes
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		textController@getTexts
 *  Method:			GET
 *  Description:	Gets all of the text notes in the app
*/
Route::get('/texts', 'textController@index');

/* ---------------------------------
 *	Get an individual text note
 *  ---------------------------------
 *  URL:			/api/texts/{id}
 *  Controller:		textController@getText
 *  Method:			GET
 *  Description:	Gets an individual text note
*/
Route::get('/texts/{id}', 'textController@show');

/* ---------------------------------
 *	Add a new text note
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		textController@postNewText
 *  Method:			POST
 *  Description:	Adds a new individual text note in the app
*/
Route::post('/texts', 'textController@store');

/* ---------------------------------
 *	Update an individual text note
 *  ---------------------------------
 *  URL:			/api/texts/{id}
 *  Controller:		textController@putText
 *  Method:			PUT
 *  Description:	Upgrade an individual text note
*/
Route::put('/texts/{id}', 'textController@update');

/* ---------------------------------
 *	Delete all text notes
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		textController@deleteTexts
 *  Method:			DELETE
 *  Description:	Delete all text notes in the app
*/
Route::delete('/texts/{id}', 'textController@destroy');

