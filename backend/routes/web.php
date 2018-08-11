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
Route::get('/register/{vue_capture?}', 'Auth\RegisterController@showRegistrationForm')->where('vue_capture', '[\/\w\.-]*');
Route::get('/verify/{vue_capture?}', 'Auth\RegisterController@showRegistrationForm')->where('vue_capture', '[\/\w\.-]*');
Route::post('/register/verify/{token}', 'Auth\RegisterController@verify');

Route::get('/profile', 'Profile\ProfileController@index')->name('profile');

Route::get('/admin/{vue_capture?}','AdminController@index')->name('admin')->where('vue_capture', '[\/\w\.-]*');

Route::get('/api/admin.show','AdminController@show');
Route::patch('/api/admin.remove/{id}','AdminController@remove');