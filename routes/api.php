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
Route::put('lessons/{id}', function(Request $request, $id){
    $lesson = Lesson::findOrfail($id);
    $lesson->update($request->all());

    return $lesson;
});


// Delete a lesson 
Route::delete('lessons/{id}', function($id){
    return Lesson::find($id)->delete();
    return 204;
});


