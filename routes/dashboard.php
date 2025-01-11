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
Route::delete("categories/delete-selected", "CategoryController@deleteSelected");
Route::get("categories/restore-selected", "CategoryController@restoreSelected");
Route::delete("contact-requests/delete-selected", "ContactRequestController@deleteSelected");
Route::delete("customers/delete-selected", "CustomerController@deleteSelected");
Route::delete("tags/delete-selected", "TagController@deleteSelected");
Route::get("tags/restore-selected", "TagController@restoreSelected");
Route::delete("cities/delete-selected", "CityController@deleteSelected");
Route::get("cities/restore-selected", "CityController@restoreSelected");
Route::delete("skin-colors/delete-selected", "SkinColorController@deleteSelected");
Route::get("skin-colors/restore-selected", "SkinColorController@restoreSelected");
Route::delete("ads/delete-selected", "AdController@deleteSelected");
Route::delete("offers/delete-selected", "OfferController@deleteSelected");
Route::delete("products/delete-selected", "ProductController@deleteSelected");
Route::get("products/restore-selected", "ProductController@restoreSelected");
Route::delete("newsletter/delete-selected", "NewsLetterController@deleteSelected");
Route::delete("design-types/delete-selected", "DesignTypeController@deleteSelected");
Route::get("design-types/restore-selected", "DesignTypeController@restoreSelected");
Route::delete("brands/delete-selected", "BrandController@deleteSelected");
Route::get("brands/restore-selected", "BrandController@restoreSelected");
Route::delete("vendors/delete-selected", "VendorController@deleteSelected");
Route::get("vendors/restore-selected", "VendorController@restoreSelected");
Route::delete("fast-shipping-city/delete-selected", "FastShippingCityController@deleteSelected");
Route::get("fast-shipping-city/restore-selected", "FastShippingCityController@restoreSelected");
Route::get("fast-shipping-city/restore/{fastCity}", "FastShippingCityController@restore");
Route::delete("packageCategories/delete-selected", "PackageCategoryController@deleteSelected");
Route::delete("packages/delete-selected", "PackagesController@deleteSelected");
Route::delete("car_prices/delete-selected", "CarPriceController@deleteSelected");
Route::delete("whyus/delete-selected", "WhyUsController@deleteSelected");
Route::get("whyus/restore-selected", "WhyUsController@restoreSelected");

Route::delete("ourlevels/delete-selected", "OurlevelController@deleteSelected");
Route::get("ourlevels/restore-selected", "OurlevelController@restoreSelected");

/** begin resources routes **/


 Route::resource('admins', 'AdminController')->except(['create', 'edit']);
 Route::resource('whyus', 'WhyUsController')->except(['create', 'edit']);
 Route::resource('ourlevels', 'OurlevelController')->except(['create', 'edit']);
 Route::resource('ourheros', 'OurheroController')->except(['create', 'edit']);

Route::resource('booking', 'BookingController')->except(['create', 'edit']);
Route::resource('brands', 'BrandController')->except(['create', 'edit']);
Route::resource('award', 'BrandController')->except(['create', 'edit']);
Route::resource('gallary', 'GallaryController')->except(['create', 'edit']);

Route::resource('blogs', 'BlogsController')->except(['create', 'edit']);
Route::resource('CommonQuestion', 'CommonQuestionController')->except(['create', 'edit']);

Route::resource('addon', 'AddonServiceController')->except(['create', 'edit']);

Route::resource('packageCategories', 'PackageCategoryController')->except(['create', 'edit']);
Route::resource('packagesubCategories', 'PackagesubCategoryController')->except(['create', 'edit']);

Route::resource('packages', 'PackagesController')->except(['create', 'edit']);
Route::resource('car_prices', 'CarPriceController')->except(['create', 'edit']);

Route::resource('cities', 'CityController')->except(['create', 'edit']);
Route::resource('categories', 'CategoryController')->except(['create', 'edit']);
Route::resource('maincategories', 'MainCategoryController')->except(['create', 'edit']);

Route::resource('design-types', 'DesignTypeController')->except(['create', 'edit']);
Route::get('/parent-categories', 'CategoryController@parentCategories');
Route::resource('contact-requests', 'ContactRequestController')->except(['create', 'edit', 'store', 'update']);
Route::resource('customers', 'CustomerController')->except(['create', 'edit']);
Route::resource('customers_rates', 'CustomersRatesController')->except(['create', 'edit']);

Route::get('customers/blocking/{customer}', 'CustomerController@blocked')->name('customers.blocked');
Route::get('customers/blocked-selected', 'CustomerController@blockedSelected');

Route::get('vendor/{vendor}/shipping-details', 'VendorController@createShippingDetails')->name('vendor.shipping-details');
Route::get('vendor/{vendor}/edit-shipping-details', 'VendorController@editShippingDetails')->name('vendor.edit-shipping-details');
Route::post('vendor/{vendor}/shipping-details', 'VendorController@storeShippingDetails')->name('vendor.store.shipping-details');
Route::post('vendor/{vendor}/edit-shipping-details', 'VendorController@updateShippingDetails')->name('vendor.update.shipping-details');
Route::post('change/vendor/{vendor}', 'VendorController@changeStatus')->name('vendor.change.status');
Route::resource('vendors', 'VendorController');
Route::resource('fast-shipping-city', 'FastShippingCityController');
Route::resource('tags', 'TagController')->except(['create', 'edit']);
Route::resource('skin-colors', 'SkinColorController')->except(['create', 'edit']);
Route::resource('ads', 'AdController')->except(['create', 'edit']);
Route::resource('offers', 'OfferController')->except(['create', 'edit']);
Route::resource('orders', 'OrderController');
Route::resource('refund-cancel-orders', 'RefundCancelOrderController');
Route::resource('sliders', 'SliderController');
Route::post('change-order-status/{id}', 'OrderController@changeOrderStatus')->name('change-order-status');
Route::post("products/{step?}", "ProductController@store")->name('products.store');
Route::put("products/{product}/{step?}", "ProductController@update")->name('products.update');
Route::get("cars/{car}/images", "CarsController@images");
Route::resource('products', 'ProductController')->except(['store', 'update']);

Route::resource('cars', 'CarsController')->except(['store', 'update']);

Route::post("cars/{step?}", "CarsController@store")->name('cars.store');
Route::put("cars/{car}/{step?}", "CarsController@update")->name('cars.update');

Route::resource('newsletter', 'NewsLetterController')->only(['index', 'destroy']);
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
    Route::match(['get', 'post'], 'general/tax', 'SettingController@tax')->name('general.tax');

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
Route::post('/send-notification', 'NotificationController@sendNotification')->name('send.notification');
Route::get('notifications/{id}/mark_as_read', 'NotificationController@markAsRead')->name('notifications.mark_as_read');
Route::get('notifications/{type}/load-more/{next}', 'NotificationController@loadMore')->name('notifications.load_more');
Route::get('notifications/mark-all-as-read', 'NotificationController@markAllAsRead')->name('notifications.mark_all_as_read');
Route::post('/fetch-data', 'DashboardController@ordersTransaction')->name('fetch.data');
