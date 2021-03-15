<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Auth;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', function () {
    return view('layouts/home');
});
Route::get('/contact', function () {
    return view('layouts/contact');
});
Route::get('/about', function () {
    return view('layouts/about');
});
Route::get('/services', function () {
    return view('layouts/services');
});

Route::get('/work-single', function () {
    return view('layouts/work-single');
});

// Albums and Photos Routes
Route::resource('albums', 'App\Http\Controllers\AlbumController');
Route::get('photos/create/{album_id}', 'App\Http\Controllers\PhotoController@create')->name('photos.create');
Route::resource('photos','App\Http\Controllers\PhotoController')->except(['create']);

// Work and SubWork Routes
Route::resource('works', 'App\Http\Controllers\WorkController');
Route::get('subWorks/create/{album_id}', 'App\Http\Controllers\SubWorkController@create')->name('subWorks.create');
Route::resource('subWorks','App\Http\Controllers\SubWorkController')->except(['create']);


//Auth::routes();
//Route::get('/admin', 'HomeController@index')->name('admin');
