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

Route::get('/', function () {
    return view('home');
});

Route::get("/login",[
'uses'=>'usersController@login',
"as"=>'user.login']);

Route::get("/create",[
'uses'=>'usersController@create',
"as"=>'user.create']);



Route::post("/auth",[
'uses'=>'usersController@auth',
"as"=>'user.auth']);

Route::get("/logout",[
'uses'=>'usersController@logout',
"as"=>'user.logout']);

Route::get("/profile",[
'uses'=>'usersController@profile',
"as"=>'user.profile']);

Route::get("/admin",[
'uses'=>'usersController@admin',
"as"=>'user.admin']);

 Route::post("/update/{id}/room",[
'uses'=>'RoomsController@update',
"as"=>'room.update']);
 Route::post("/update/{id}/hotel",[
'uses'=>'HotelsController@update',
"as"=>'hotel.update']);
  Route::post("/search",[
'uses'=>'HotelsController@search',
"as"=>'hotel.search']);
  Route::post("/delete/{id}/hotel",[
'uses'=>'HotelsController@delete',
"as"=>'hotel.delete']);
 Route::get("/delete/{id}/room",[
'uses'=>'RoomsController@destroy',
"as"=>'room.delete']);
  Route::get("/delete/{id}/booking",[
'uses'=>'BookingController@destroy',
"as"=>'booking.delete']);
   Route::get("/delete/{id}/user",[
'uses'=>'UserController@destroy',
"as"=>'Users.delete']);


Route::resource("/users",'usersController');
Route::resource("/booking","BookingController");
Route::resource("/rooms",'RoomsController');
Route::resource("/hotels",'HotelsController');
