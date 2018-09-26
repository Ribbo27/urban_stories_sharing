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
 *  Controller:		FileController@index
 *  Method:			GET
 *  Description:	Gets all of the files in the app
*/
Route::get('/files', 'FileController@index');

/* ---------------------------------
 *	Get a specified file
 *  ---------------------------------
 *  URL:			/api/files/{id}
 *  Controller:		FileController@show
 *  Method:			GET
 *  Description:	Gets a specified file in the app
*/
Route::get('/files/{id}', 'FileController@show');

/* ---------------------------------
 *	API LAYER FOR TEXT NOTE
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all text notes
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		TextController@getTexts
 *  Method:			GET
 *  Description:	Gets all the text notes in the app
*/
Route::get('/texts', 'TextController@index');

/* ---------------------------------
 *	Get an individual text note
 *  ---------------------------------
 *  URL:			/api/texts/{id}
 *  Controller:		TextController@getText
 *  Method:			GET
 *  Description:	Gets an individual text note
*/
Route::get('/texts/{id}', 'TextController@show');

/* ---------------------------------
 *	Add a new text note
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		TextController@postNewText
 *  Method:			POST
 *  Description:	Adds a new individual text note in the app
*/
Route::post('/texts', 'TextController@store');

/* ---------------------------------
 *	Update an individual text note
 *  ---------------------------------
 *  URL:			/api/texts/{id}
 *  Controller:		TextController@putText
 *  Method:			PUT
 *  Description:	Upgrade an individual text note
*/
Route::put('/texts/{id}', 'TextController@update');

/* ---------------------------------
 *	Delete all text notes
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		TextController@deleteTexts
 *  Method:			DELETE
 *  Description:	Delete all text notes in the app
*/
Route::delete('/texts/{id}', 'TextController@destroy');

/* ---------------------------------
 *	API LAYER FOR PHOTO
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all photos
 *  ---------------------------------
 *  URL:			/api/photos
 *  Controller:		PhotoController@index
 *  Method:			GET
 *  Description:	Gets all the photo saved in the app
*/
Route::get('/photos', 'PhotoController@index');

 /* ---------------------------------
 *	Get a specified photo
 *  ---------------------------------
 *  URL:			/api/photos
 *  Controller:		PhotoController@show
 *  Method:			GET
 *  Description:	Gets a specified photo
*/
Route::get('/photos/{id}', 'PhotoController@show');

/* ---------------------------------
 *	Add a new photo
 *  ---------------------------------
 *  URL:			/api/photos
 *  Controller:		PhotoController@postNewText
 *  Method:			POST
 *  Description:	Adds a new photo in the app
*/
Route::post('/photos', 'PhotoController@store');







/* ---------------------------------
 *	API LAYER FOR LOCATION
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all locations
 *  ---------------------------------
 *  URL:			/api/locations
 *  Controller:		LocationController@index
 *  Method:			GET
 *  Description:	Gets all the location saved in the app
*/
Route::get('/locations', 'LocationController@index');

 /* ---------------------------------
 *	Get a specified location
 *  ---------------------------------
 *  URL:			/api/locations
 *  Controller:		LocationController@show
 *  Method:			GET
 *  Description:	Gets a specified location
*/
Route::get('/locations/{id}', 'LocationController@show');


