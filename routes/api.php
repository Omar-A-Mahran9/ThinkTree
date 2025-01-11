<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
    Route::get('general', 'GeneralInvokableController');
    Route::get('ourheroes', 'dataController@ourheroes');

    Route::post('contact_us', 'ContactUsController@store');
    Route::get('blogs', 'HomeController@getblogs');
    Route::get('blog/{id}', 'HomeController@getblog');

    Route::get('questions', 'HomeController@getQuestions');
    Route::post('bepartener/{step}', 'BeWhyUsController@store');

    Route::get('booking',[BookingController::class,'index']);
    Route::post('booking',[BookingController::class,'store']);

    Route::post('filter_car_prices',[BookingController::class,'filterPertrip']);
    Route::post('filter_Packages',[BookingController::class,'filterPackages']);

