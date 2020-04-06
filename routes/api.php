<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('caseRecord', 'CaseRecordController@index');
Route::get('caseRecord/{id}', 'CaseRecordController@show');
Route::post('caseRecord', 'CaseRecordController@store');
Route::put('caseRecord/{id}', 'CaseRecordController@update');
Route::delete('caseRecord/{id}', 'CaseRecordController@delete');

Route::get('contact', 'ContactController@index');
Route::get('contact/{id}', 'ContactController@show');
Route::post('contact', 'ContactController@store');
Route::put('contact/{id}', 'ContactController@update');
Route::delete('contact/{id}', 'ContactController@delete');

Route::get('death', 'DeathController@index');
Route::get('death/{id}', 'DeathController@show');
Route::post('death', 'DeathController@store');
Route::put('death/{id}', 'DeathController@update');
Route::delete('death/{id}', 'DeathController@delete');

Route::get('emergency-contact', 'EmergencyContactController@index');
Route::get('emergency-contact/{id}', 'EmergencyContactController@show');
Route::post('emergency-contact', 'EmergencyContactController@store');
Route::put('emergency-contact/{id}', 'EmergencyContactController@update');
Route::delete('emergency-contact/{id}', 'EmergencyContactController@delete');

Route::get('news', 'NewsController@index');
Route::get('news/{id}', 'NewsController@show');
Route::post('news', 'NewsController@store');
Route::put('news/{id}', 'NewsController@update');
Route::delete('news/{id}', 'NewsController@delete');

Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@show');
Route::post('user', 'UserController@store');
Route::put('user/{id}', 'UserController@update');
Route::delete('user/{id}', 'UserController@delete');