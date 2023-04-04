<?php

use App\Models\Tag;
use App\Models\User;
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

Route::group(['prefix' => '/v1'], function () {

    // Get all lessons
    Route::get('lessons', function () {
        return Lesson::all();
    });

    // Get one lesson
    Route::get('lessons/{id}', function ($id) {
        return Lesson::find($id);
    });

    // Create a lesson
    Route::post('lessons', function (Request $request) {
        return Lesson::create($request->all());
    });

    // Update a lesson
    Route::match(['put', 'patch'], 'lessons/{id}', function (Request $request, $id) {
        $lesson = Lesson::findOrfail($id);
        $lesson->update($request->all());

        return $lesson;
    });


    // Delete a lesson 
    Route::delete('lessons/{id}', function ($id) {
        Lesson::find($id)->delete();
        return 204;
    });

    

    // Get all users
    Route::get('users', function () {
        return User::all();
    });

    // Get one User
    Route::get('users/{id}', function ($id) {
        return User::find($id);
    });

    // Create a User
    Route::post('users', function (Request $request) {
        return User::create($request->all());
    });

    // Update a User
    Route::match(['put', 'patch'], 'users/{id}', function (Request $request, $id) {
        $user = User::findOrfail($id);
        $user->update($request->all());

        return $user;
    });


    // Delete a User 
    Route::delete('users/{id}', function ($id) {
        User::find($id)->delete();
        return 204;
    });


    // Get all tags
    Route::get('tags', function () {
        return Lesson::all();
    });

    // Get one Tag
    Route::get('tags/{id}', function ($id) {
        return Tag::find($id);
    });

    // Create a Tag
    Route::post('tags', function (Request $request) {
        return Tag::create($request->all());
    });

    // Update a Tag
    Route::match(['put', 'patch'], 'tags/{id}', function (Request $request, $id) {
        $tag = Tag::findOrfail($id);
        $tag->update($request->all());

        return $tag;
    });


    // Delete a tag 
    Route::delete('tags/{id}', function ($id) {
        Tag::find($id)->delete();
        return 204;
    });

// To Warn the user
    // Route::any('lesson', function(){
    //     return "Please make sure to update your code to the newer version of our API. You should use lessons instead of lesson";
    // });

    Route::redirect('lesson', 'lessons');
});
