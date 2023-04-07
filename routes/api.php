<?php

use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\RelationshipController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => '/v1'], function () {

Route::apiResource('lessons', LessonController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('tags', TagController::class);
    


    Route::get('users/{id}/lessons', [RelationshipController::class, 'userLessons']);

    Route::get('lessons/{id}/tags', [RelationshipController::class, 'lessonTags']);

    Route::get('tags/{id}/lessons', [RelationshipController::class, 'tagLessons']);

    //To Warn the user
    Route::any('lesson', function(){
        $message = 'Please make sure to update your code to the newer version of our API. You should use lessons instead of lesson';

        return Response::json($message, 404);
    });

    //Route::redirect('lesson', 'lessons');
});



    // في حالة تبغى تحط اسم حساب الشخص قبل الدومين
    // Route::domain('{account}.myapp.com')->group(function(){
    //     Route::get('user/{id}', function($account, $id){
    //         //
    //     });
    // });

    
    //سلج تأخذ اسم الدرس وتحطه محترم بدل تكتب رقم
    // Route::get('lessons/{lesson:slug}', function($lesson){
    //     return $lesson;
    // });

    // اذا فشل الطلب شغل التالي 
    // Route::fallback( function(){
    //     //
    // });



