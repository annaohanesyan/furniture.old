<?php

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
Route::get('locale/{locale}', function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});

//-----------------------Front pages----------------------

Route::get('/', function () {
    return view('mainPage/welcome');
})->name('base');

Route::resource('/services', 'Front\ServicesController');
Route::resource('/about', 'Front\AboutController');
Route::get('/contact', 'Front\ContactController@contact')->name('contact');
Route::post('/send_email', 'Front\ContactController@sendEmail')->name('send_mail');



Route::get('/livingroomfur', 'Front\ServicesController@livingroomFur')->name('livingroomfur');
Route::get('/livingroomfur/{id}', 'Front\ServicesController@livingroomShow')->name('livingroomShow');

Route::get('/bedroomfur', 'Front\ServicesController@bedroomFur')->name('bedroomfur');
Route::get('/bedroomfur/{id}', 'Front\ServicesController@bedroomShow')->name('bedroomShow');

Route::get('/kitchenfur', 'Front\ServicesController@kitchenFur')->name('kitchenfur');
Route::get('/kitchenfur/{id}', 'Front\ServicesController@kitchenShow')->name('kitchenShow');

Route::get('/babyroomfur', 'Front\ServicesController@babyroomFur')->name('babyroomfur');
Route::get('/babyroomfur/{id}', 'Front\ServicesController@babyroomShow')->name('babyroomShow');

Route::get('/lobbyfur', 'Front\ServicesController@lobbyFur')->name('lobbyfur');
Route::get('/lobbyfur/{id}', 'Front\ServicesController@lobbyShow')->name('lobbyShow');

Route::get('/offisefur', 'Front\ServicesController@offiseFur')->name('offisefur');
Route::get('/offisefur/{id}', 'Front\ServicesController@offiseShow')->name('offiseShow');

Route::get('/bathroomfur', 'Front\ServicesController@bathroomFur')->name('bathroomfur');
Route::get('/bathroomfur/{id}', 'Front\ServicesController@bathroomShow')->name('bathroomShow');

Route::post('/send_message', 'Front\ServicesController@send_message')->name('send_message');
//-----------------------------Views, Like, DisLike------------------------
Route::post('/views_count/{id}', 'Front\ServicesController@views_count')->name('views_count');
Route::post('/like/{id}', 'Front\ServicesController@like')->name('like');
Route::post('/dislike/{id}', 'Front\ServicesController@disLike')->name('dislike');

//----------------------------- Shopping Cart------------------------

Route::post('/add_to_cart/{id}', 'Front\ServicesController@getAddToCart')->name('product.addToCart');
Route::get('/shopping_cart', 'Front\ServicesController@getCart')->name('product.shoppingCart');
Route::get('/checkout', 'Front\ServicesController@getCheckout')->name('checkout');
Route::post('/checkout', 'Front\ServicesController@postCheckout')->name('checkout');
//--------------------------Admin pages-------------------------

Auth::routes();

Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

Route::resource('/bedroom', 'Admin\BedroomController');
Route::delete('/delete_sel', 'Admin\BedroomController@deleteAll')->name('deleteAllSelected');
Route::get('bed_furnitures/duplicate/{id}', 'Admin\BedroomController@duplicate')->name('duplicate');

Route::resource('/livingroom', 'Admin\LivingroomController');
Route::get('livingroom_furnitures/duplicate/{id}', 'Admin\LivingroomController@duplicate')->name('living_duplicate');
Route::delete('living/delete_sel', 'Admin\LivingroomController@deleteAll')->name('deleteAllSelectedLivinroom');

Route::resource('/kitchen', 'Admin\KitchenController');
Route::get('kitchen_furnitures/duplicate/{id}', 'Admin\KitchenController@duplicate')->name('kitchen_duplicate');
Route::delete('kitchen_sel/delete_sel', 'Admin\KitchenController@deleteAll')->name('deleteAllSelectedKitchen');

Route::resource('/babyroom', 'Admin\BabyroomController');
Route::get('baby_furnitures/duplicate/{id}', 'Admin\BabyroomController@duplicate')->name('babyfur_duplicate');
Route::delete('baby_sel/delete_sel', 'Admin\BabyroomController@deleteAll')->name('deleteAllSelectedBabyFur');

Route::resource('/lobby', 'Admin\LobbyController');
Route::get('lobby_furnitures/duplicate/{id}', 'Admin\LobbyController@duplicate')->name('lobbyfur_duplicate');
Route::delete('lobby_sel/delete_sel', 'Admin\LobbyController@deleteAll')->name('deleteAllSelectedLobbyFur');

Route::resource('/offise', 'Admin\OffiseController');
Route::get('offise_furnitures/duplicate/{id}', 'Admin\OffiseController@duplicate')->name('Offisefur_duplicate');
Route::delete('offise_sel/delete_sel', 'Admin\OffiseController@deleteAll')->name('deleteAllSelectedOffiseFur');

Route::resource('/bathroom', 'Admin\BathroomController');
Route::get('bathroom_furnitures/duplicate/{id}', 'Admin\BathroomController@duplicate')->name('bathroomfur_duplicate');
Route::delete('bathroom_sel/delete_sel', 'Admin\BathroomController@deleteAll')->name('deleteAllSelectedBathroomFur');

