<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// })->name('index');

Route::get("/", "DashboardController@index")->name('index');
/* begin Delete And restore */
Route::delete("admins/delete-selected", "AdminController@deleteSelected");
Route::get("admins/restore-selected", "AdminController@restoreSelected");
 Route::delete("contact-requests/delete-selected", "ContactRequestController@deleteSelected");
Route::delete("customers/delete-selected", "CustomerController@deleteSelected");
Route::delete("children/delete-selected", "childrenController@deleteSelected");

Route::delete("tags/delete-selected", "TagController@deleteSelected");
Route::get("tags/restore-selected", "TagController@restoreSelected");
Route::delete("cities/delete-selected", "CityController@deleteSelected");
Route::get("cities/restore-selected", "CityController@restoreSelected");
Route::delete("packages/delete-selected", "PackagesController@deleteSelected");
Route::delete("car_prices/delete-selected", "CarPriceController@deleteSelected");
Route::delete("whyus/delete-selected", "WhyUsController@deleteSelected");
Route::get("whyus/restore-selected", "WhyUsController@restoreSelected");
Route::delete("trip/delete-selected", "TripController@deleteSelected");
Route::get("trip/restore-selected", "TripController@restoreSelected");
Route::delete("tags/delete-selected", "TagController@deleteSelected");
Route::get("tags/restore-selected", "TagController@restoreSelected");
Route::delete("newsletter/delete-selected", "NewsLetterController@deleteSelected");

Route::delete("ourlevels/delete-selected", "OurlevelController@deleteSelected");
Route::get("ourlevels/restore-selected", "OurlevelController@restoreSelected");


Route::delete("skills/delete-selected", "SkillController@deleteSelected");
Route::get("skills/restore-selected", "SkillController@restoreSelected");


Route::delete("vision/delete-selected", "VisionController@deleteSelected");
Route::get("vision/restore-selected", "VisionController@restoreSelected");

Route::delete("ourheroes/delete-selected", "OurheroController@deleteSelected");
Route::get("ourheroes/restore-selected", "OurheroController@restoreSelected");

Route::delete("outcomes/delete-selected", "OutcomeController@deleteSelected");
Route::get("outcomes/restore-selected", "OutcomeController@restoreSelected");
Route::delete("days/delete-selected", "DaysController@deleteSelected");
Route::get("days/restore-selected", "DaysController@restoreSelected");

/** begin resources routes **/


 Route::resource('admins', 'AdminController')->except(['create', 'edit']);
 Route::resource('whyus', 'WhyUsController')->except(['create', 'edit']);
 Route::resource('trip', 'TripController')->except(['create', 'edit']);
 Route::resource('newsletter', 'NewsLetterController')->only(['index', 'destroy']);

 Route::resource('ourlevels', 'OurlevelController')->except(['create', 'edit']);

 Route::resource('skills', 'SkillController')->except(['create', 'edit']);

 Route::resource('vision', 'VisionController')->except(['create', 'edit']);

 Route::resource('ourheroes', 'OurheroController')->except(['create', 'edit']);

Route::resource('cities', 'CityController')->except(['create', 'edit']);
Route::resource('numbers', 'NumbersController')->except(['create', 'edit']);

Route::resource('outcomes', 'OutcomeController')->except(['create', 'edit']);
Route::resource('features', 'FeatureController')->except(['create', 'edit']);
  Route::resource('contact-requests', 'ContactRequestController')->except(['create', 'edit', 'store', 'update']);
Route::resource('customers', 'CustomerController')->except(['create', 'edit']);
Route::resource('children', 'childrenController')->except(['create', 'edit']);

Route::resource('customers_rates', 'CustomersRatesController')->except(['create', 'edit']);
Route::resource('packages', 'PackagesController')->except(['create', 'edit']);
Route::resource('groups', 'GroupsController')->except(['create', 'edit']);
Route::resource('days', 'DaysController')->except(['create', 'edit']);
Route::resource('times', 'TimeController')->except(['create', 'edit']);
Route::resource('tags', 'TagController')->except(['create', 'edit']);
Route::resource('orders', 'OrderController');

Route::get('customers/blocking/{customer}', 'CustomerController@blocked')->name('customers.blocked');
Route::get('customers/blocked-selected', 'CustomerController@blockedSelected');
 Route::get('profile-info', 'ProfileController@profileInfo')->name('profile-info');
Route::put('update-profile-info', 'ProfileController@updateProfileInfo')->name('update-profile-info');
Route::put('update-profile-email', 'ProfileController@updateProfileEmail')->name('update-profile-email');
Route::put('update-profile-password', 'ProfileController@updateProfilePassword')->name('update-profile-password');
/** ajax routes **/
Route::post('dropzone/validate-image', 'DropzoneController@validateImage')->name('dropzone.validate-image');
Route::post("select2-ajax/subcategories", "ProductController@getSubcategories")->name('select2-ajax.subcategories');
Route::post("select2-ajax/vendor-cities", "ProductController@getCitiesBasedOnVendor")->name('select2-ajax.vendor-cities');

/**  ====================SETTINGS======================  **/
Route::prefix('settings')->name('settings.')->group(function () {
    Route::match(['get', 'post'], 'general/main', 'SettingController@main')->name('general.main');
    Route::match(['get', 'post'], 'general/terms', 'SettingController@terms')->name('general.terms');
    Route::match(['get', 'post'], 'general/contact', 'SettingController@contact')->name('general.contact');
    Route::match(['get', 'post'], 'general/mobile-app', 'SettingController@mobileApp')->name('general.mobile_app');
    Route::match(['get', 'post'], 'general/landing', 'SettingController@landingPageContent')->name('general.landing');
    Route::match(['get', 'post'], 'general/metatags', 'SettingController@metatags')->name('general.metatags');

    Route::resource('roles', 'RoleController');
    Route::get('role/{role}/admins', 'RoleController@admins');

    Route::match(['get', 'post'], 'home-content/main', 'HomeController@index')->name('home-content');
    Route::match(['get', 'post'], 'home-content/about-us', 'HomeController@aboutUs')->name('home.about-us');
    Route::match(['get', 'post'], 'home-content/terms', 'HomeController@terms')->name('home.terms');
    Route::match(['get', 'post'], 'home-content/privacy-policy', 'HomeController@privacyPolicy')->name('home.privacy-policy');
    Route::match(['get', 'post'], 'home-content/return-policy', 'HomeController@returnPolicy')->name('home.return-policy');
    Route::match(['get', 'post'], 'home-content/loyality', 'HomeController@loyality')->name('home.loyality');




});

Route::get('trash/{modelName}/{id}/restore', 'TrashController@restore')->name('trash.restore');
Route::get('trash/{modelName?}', 'TrashController@index')->name('trash');
Route::get('trash/{modelName}/{id}', 'TrashController@restore');
Route::get('/language/{lang}', function (Request $request) {
    session()->put('locale', $request->lang);
    return redirect()->back();
})->name('change-language');
/** notifications routes **/
Route::post('/save-token', 'NotificationController@saveToken')->name('save-token');
 Route::post('/fetch-data', 'DashboardController@ordersTransaction')->name('fetch.data');
