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

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/home');
    }

    return view('welcome', [
        'registers' => User::prettyCount(),
        'classes' => \App\EducationalClass::count(),
    ]);
});

Auth::routes();

Route::get('/home/{vue_capture?}', 'HomeController@listClasses')->name('home')->where('vue_capture', '[\/\w\.-]*');
Route::get('/courses/{vue_capture?}', 'HomeController@myCourses')->name('courses')->where('vue_capture', '[\/\w\.-]*');

Route::get('/api/home.getClasses', 'HomeController@apiClasses');
// As teacher
Route::get('/api/home.getMyJobClasses', 'HomeController@apiMyJobClasses');
Route::get('/api/home.getMyClasses', 'HomeController@apiMyClasses');


// Auth group
Route::get('/register/{vue_capture?}', 'Auth\RegisterController@showRegistrationForm')->where('vue_capture', '[\/\w\.-]*');
Route::get('/verify/{vue_capture?}', 'Auth\RegisterController@showRegistrationForm')->where('vue_capture', '[\/\w\.-]*');
Route::post('/register/verify/{token}', 'Auth\RegisterController@verify');

Route::get('/profile', 'Profile\ProfileController@index')->name('profile');

Route::get('/admin/{vue_capture?}','AdminController@index')->name('admin')->where('vue_capture', '[\/\w\.-]*');

Route::get('/api/admin.show','AdminController@show');
Route::patch('/api/admin.remove/{id}','AdminController@remove');