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

Auth::routes();

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('district','API\DistrictApiController');
// Route::resource('company','API\CompanyApiController');
// Route::resource('ward','API\WardApiController');
// Route::resource('municipality','API\MunicipalityApiController');

Route::POST('register','API\RegisterApiController@create');
Route::Post('login','API\LoginApiController@login');

route::group(['middleware'=>'auth:api'],function(){
Route::apiResource('municipality','API\MunicipalityApiController');
Route::resource('district','API\DistrictApiController');
Route::resource('company','API\CompanyApiController');
Route::resource('ward','API\WardApiController');
});

