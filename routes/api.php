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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'Admin\AuthController@login');
    Route::post('logout', 'Admin\AuthController@logout');
    Route::post('refresh', 'Admin\AuthController@refresh');
    Route::post('me', 'Admin\AuthController@me');

});

// Route::group(['middleware' => ['cors', 'api', 'jwt.auth']], function () { 
    
    Route::resource('profile/users', 'User\UserController');

    Route::resource('categories', 'Gestion\CategoryController')->only([
        'index'
    ]);

    Route::resource('countries', 'Gestion\CountryController')->only([
        'index'
    ]);

// });