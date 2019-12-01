<?php

use Illuminate\Http\Request;
use App\Events\TodoAdded;
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
Route::get('/todos',function(){
	return \App\Todo::all();
	
});
Route::post('/todos',function(){

	$todo = \App\Todo::create(request()->all());

	return $todo;
	
});
Route::post('/todos',function(){
    $todo = \App\Todo::create(request()->all());
    // event(new TodoAdded($todo));
    event((new TodoAdded($todo))->dontBroadcastToCurrentUser());
	return $todo;
	
});
