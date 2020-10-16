<?php

//use Illuminate\Http\Request;

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

Route::middleware('auth:api')->group(function(){
  Route::get('/marksentered', 'MarksController@checkMarksEntered');
  Route::get('/uniqueslug', 'DiscussionsController@uniqueSlug');
});
Route::middleware('auth:student-api')->group(function(){
  Route::get('/discussions/{discussion}/comments', 'CommentsController@index');
  Route::get('/discussions/{discussion}/comment', 'CommentsController@store');
});