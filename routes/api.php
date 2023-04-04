<?php

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function(){

// Get all lessons
Route::get('lessons', function(){
    return Lesson::all();
});

// Get one lesson
Route::get('lessons/{id}', function($id){
    return Lesson::find($id);
});

// Create a lesson
Route::post('lessons', function(Request $request){
    return Lesson::create($request->all());
});

// Update a lesson
Route::match(['put','patch'],'lessons/{id}', function(Request $request, $id){
    $lesson = Lesson::findOrfail($id);
    $lesson->update($request->all());

    return $lesson;
});


// Delete a lesson 
Route::delete('lessons/{id}', function($id){
    return Lesson::find($id)->delete();
    return 204;
});

// Route::any('lesson', function(){
//     return "Please make sure to update your code to the newer version of our API. You should use lessons instead of lesson";
// });

Route::redirect('lesson', 'lessons');


});