<?php



use App\CustomClass\Car;
use App\CustomClass\Test;




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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/room', 'RoomController@index')->name('room');

Route::get('/room/create', 'RoomController@create')->name('room-create');


Route::post('/room/store', 'RoomController@store')->name('room-store');

