<?php

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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/home');
    }

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/getTeachers/{skip?}/{take?}', 'HomeController@teachers');


// Auth group
Route::get('/verify/{token}', 'Auth\RegisterController@verify');

Route::get('/profile', 'Profile\ProfileController@index')->name('profile');

Route::get('/admin','AdminController@index')->name('admin');

Route::get('/admin/show','AdminController@show');
Route::patch('/admin/remove/{id}','AdminController@remove');