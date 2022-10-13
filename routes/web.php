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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('albums/store', 'App\Http\Controllers\AlbumController@store')->middleware('auth');
Route::get('albums/create', 'App\Http\Controllers\AlbumController@create')->middleware('auth');
Route::get('albums', 'App\Http\Controllers\AlbumController@index')->middleware('auth');
Route::get('getalbums', [App\Http\Controllers\AlbumController::class,'getAlbums'])->middleware('auth');
Route::get('albums/{slug}/{id}', [App\Http\Controllers\GalleryControler::class,'viewAlbum']);
Route::put('/albums/{id}/edit', [App\Http\Controllers\AlbumController::class,'update'])->middleware('auth');
Route::delete('/albums/{id}/delete', [App\Http\Controllers\AlbumController::class,'destroy'])->middleware('auth');
//Route::resource('albums', App\Http\Controllers\AlbumController::class)->middleware('auth');
Route::get('upload/images/{id}',[\App\Http\Controllers\GalleryControler::class,'create'])->middleware('auth');
Route::post ('uploadImage',[\App\Http\Controllers\GalleryControler::class,'upload'])->middleware('auth');
Route::get('getimages',[\App\Http\Controllers\GalleryControler::class,'images'])->middleware('auth');
Route::delete('images/{id}',[\App\Http\Controllers\GalleryControler::class,'destroy'])->middleware('auth');
