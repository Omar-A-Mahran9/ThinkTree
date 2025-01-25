<?php

 use App\Http\Controllers\Api\OrderController;
 use App\Http\Controllers\Api\dataController;

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
    Route::get('about_us', 'AboutusInvokableController');
    Route::get('meta_tags', 'metatagsInvokableController');

    Route::get('ourheroes', 'dataController@ourheroes');
    Route::get('packages', 'dataController@packages');
    Route::post('contact_us', 'ContactUsController@store');
    Route::get('test_link', 'TestInvokableController');
    Route::post('news-letter', 'HomeController@newsLetter');
    Route::get('tags', 'HomeController@getTags');

    Route::get('package/{id}', 'dataController@package');
    Route::get('timeslot', 'dataController@timeslot');
    Route::get('footer', 'dataController@footer');

    Route::post('/order/store/{step}', [OrderController::class, 'store'])->name('order.store');

    
 