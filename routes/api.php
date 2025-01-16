<?php

 use App\Http\Controllers\Api\OrderController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
 
    Route::get('general', 'GeneralInvokableController');
    Route::get('ourheroes', 'dataController@ourheroes');
    Route::get('packages', 'dataController@packages');
    Route::post('contact_us', 'ContactUsController@store');
    Route::post('/order/store/{step}', [OrderController::class, 'store'])->name('order.store');
 