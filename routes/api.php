<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\Text;

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

//Route::middleware('api')->get('/user', function (Request $request) {
//    return App\Text::all();
//});


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

/* ---------------------------------
 *	API LAYER FOR NOTE
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all notes
 *  ---------------------------------
 *  URL:			/api/notes
 *  Controller:		NoteController@index
 *  Method:			GET
 *  Description:	Gets all the notes saved in the app
*/
Route::get('/notes', 'NoteController@index');

/* ---------------------------------
 *	Get a specified note
 *  ---------------------------------
 *  URL:			/api/notes/{id}
 *  Controller:		NoteController@show
 *  Method:			GET
 *  Description:	Gets a specified note
*/
Route::get('/notes/{id}', 'NoteController@show');

/* ---------------------------------
 *	API LAYER FOR TEXT 
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all texts
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		TextController@getTexts
 *  Method:			GET
 *  Description:	Gets all the texts in the app
*/
Route::get('/texts', 'TextController@index');

/* ---------------------------------
 *	Get an individual text
 *  ---------------------------------
 *  URL:			/api/texts/{id}
 *  Controller:		TextController@getText
 *  Method:			GET
 *  Description:	Gets an individual text 
*/
Route::get('/texts/{id}', 'TextController@show');

/* ---------------------------------
 *	Add a new text 
 *  ---------------------------------
 *  URL:			/api/texts
 *  Controller:		TextController@store
 *  Method:			POST
 *  Description:	Adds a new individual text in the app
*/
Route::post('/texts', 'TextController@store');

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
 *  Controller:		PhotoController@store
 *  Method:			POST
 *  Description:	Adds a new photo in the app
*/
Route::post('/photos', 'PhotoController@store');

/* ---------------------------------
 *	API LAYER FOR AUDIO
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all audios
 *  ---------------------------------
 *  URL:			/api/audios
 *  Controller:		AudioController@index
 *  Method:			GET
 *  Description:	Gets all the audios saved in the app
*/
Route::get('/audios', 'AudioController@index');

 /* ---------------------------------
 *	Get a specified audio
 *  ---------------------------------
 *  URL:			/api/audios
 *  Controller:		AudioController@show
 *  Method:			GET
 *  Description:	Gets a specified audio
*/
Route::get('/audios/{id}', 'AudioController@show');

/* ---------------------------------
 *	Add a new audio
 *  ---------------------------------
 *  URL:			/api/audios
 *  Controller:		AudioController@store
 *  Method:			POST
 *  Description:	Adds a new audio in the app
*/
Route::post('/audios', 'AudioController@store');

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
 *	API LAYER FOR VIDEO
 * ---------------------------------
 */

 /* ---------------------------------
 *	Get all videos
 *  ---------------------------------
 *  URL:			/api/videos
 *  Controller:		VideoController@index
 *  Method:			GET
 *  Description:	Gets all the videos saved in the app
*/
Route::get('/videos', 'VideoController@index');

 /* ---------------------------------
 *	Get a specified video
 *  ---------------------------------
 *  URL:			/api/videos
 *  Controller:		VideoController@show
 *  Method:			GET
 *  Description:	Gets a specified video
*/
Route::get('/videos/{id}', 'VideoController@show');

/* ---------------------------------
 *	Add a new video
 *  ---------------------------------
 *  URL:			/api/videos
 *  Controller:		VideoController@store
 *  Method:			POST
 *  Description:	Adds a new video in the app
*/
Route::post('/videos', 'VideoController@store');
