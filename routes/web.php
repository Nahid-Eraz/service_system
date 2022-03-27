<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend
Route::get('/', function () {
    return view('frontend.homepage');
});
Route::get('/homepage', function () {
    return view('frontend.homepage');
})->name('homepage');

Route::get('/about', function () {
    return view('frontend.about');
});


Route::get('/cart', function () {
    return view('frontend.cart');
});
Route::get('/contact_us', function () {
    return view('frontend.contact_us');
})->name('contact');
// Route::get('/allservices', function () {
//     return view('frontend.allservices');
// });
Route::get('/checkout', function () {
    return view('frontend.checkout');
});
Route::get('/confirmation', function () {
    return view('frontend.confirmation');
});
Route::get('/loginpage', function () {
    return view('frontend.login');
})->name('customer.login');
Route::get('/signinpage', function () {
    return view('frontend.signin');
})->name('customer.signin');

//backend
Route::get('/admin/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');
// Route::get('/provider', function () {
//     return view('backend.registration.provider_register');
// });
// Route::get('/banner', function () {
//     return view('backend.banner');
// });
Auth::routes();

Route::get('/home', "App\Http\Controllers\HomeController@index")->name('home');


//category
Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::get('/category', "App\Http\Controllers\CategoryController@index")->name('category');
Route::post('/category-add', "App\Http\Controllers\CategoryController@store")->name('service.add');
Route::get('/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('service.edit');
Route::put('/category/update/{id}', 'App\Http\Controllers\CategoryController@update');
Route::delete('/category/{id}', "App\Http\Controllers\CategoryController@destroy")->name('service.delete');


// banner
Route::resource('banner', 'App\Http\Controllers\BannerController');
Route::get('/banner', "App\Http\Controllers\BannerController@index")->name('banner');
Route::post('/banner-add', "App\Http\Controllers\BannerController@store")->name('advertisement.add');
Route::get('/banner/edit/{id}', "App\Http\Controllers\BannerController@edit")->name('advertisement.edit');
Route::put('/banner/update/{id}', "App\Http\Controllers\BannerController@update");
Route::delete('/banner/{id}', "App\Http\Controllers\BannerController@destroy")->name('advertisement.delete');


// provider_register
// Route::resource('provider', 'App\Http\Controllers\ProviderController');
Route::get('/provider','App\Http\Controllers\ProviderController@index')->name('provider');
Route::post('/provider-add', "App\Http\Controllers\ProviderController@store")->name('provider.add');
Route::get('/provider/district/{id}', 'App\Http\Controllers\ProviderController@getdistrict')->name('provider.district');
Route::get('/provider/upazila/{id}', 'App\Http\Controllers\ProviderController@getupazila')->name('provider.upazila');
Route::get('/provider/edit/{id}', "App\Http\Controllers\ProviderController@edit")->name('provider.edit');
Route::put('/provider/update/{id}', "App\Http\Controllers\ProviderController@update");


//frontpage
Route::get('/allservices','App\Http\Controllers\FrontpageController@allservices')->name('allservices');
Route::get('/customorder','App\Http\Controllers\FrontpageController@getdivision')->name('customeorder');
Route::get('/custom/order/district/{id}', 'App\Http\Controllers\FrontpageController@getdistrict')->name('customorder.district');
Route::get('/custom/order/upazila/{id}', 'App\Http\Controllers\FrontpageController@getupazila')->name('customorder.upazila');
Route::post('/custom/order', 'App\Http\Controllers\FrontpageController@custom_order_store')->name('customorder.add');

Route::get('/jobportal','App\Http\Controllers\FrontpageController@jobportal');
Route::get('/order/request/edit/{id}', 'App\Http\Controllers\FrontpageController@request_order');
Route::post('/order/request', 'App\Http\Controllers\FrontpageController@request_order_store')->name('orderrequest.add');
Route::get('/order/request/{name}','App\Http\Controllers\FrontpageController@show')->name('orderrequest.details');
// User
Route::get('/user/login','App\Http\Controllers\ClientController@login')->name('login.form');
Route::post('/user/login','App\Http\Controllers\ClientController@loginSubmit')->name('login.submit');
Route::get('/user/logout','App\Http\Controllers\ClientController@logout')->name('user.logout');
Route::get('user/register','App\Http\Controllers\ClientController@register')->name('register.form');
Route::post('user/register','App\Http\Controllers\ClientController@registerSubmit')->name('register.submit');
Route::get('/user/profileview','App\Http\Controllers\ClientController@profileview')->name('profileview');

