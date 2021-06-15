<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/v1')->group(function () {

    Route::apiResource('lessons', 'App\Http\Controllers\API\LessonController');
    Route::redirect('lesson', 'lessons', 301);


    
    
    Route::apiResource('users', 'App\Http\Controllers\API\UserController');
    Route::redirect('user', 'users', 301);
    



    Route::any('leee', function () {
        $message = "Wrong Api Request";
        return Response::json($message,404);
    });
    

    
    Route::apiResource('tags', 'App\Http\Controllers\API\TagController');
    Route::redirect('tag', 'tags', 301);
    

    

    Route::get('users/{id}/lessons', 'App\Http\Controllers\API\RelationshipController@userLessons');
    Route::get('lessons/{id}/tags', 'App\Http\Controllers\API\RelationshipController@lessonTags');
    Route::get('tags/{id}/lessons', 'App\Http\Controllers\API\RelationshipController@tagLessons');
    Route::get('/login', 'App\Http\Controllers\API\LoginController@login')->name('login');
});
