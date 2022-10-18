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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[App\Http\Controllers\FrontendControler::class,'index']);
Auth::routes();
Route::get('/user/profile/{id}',[\App\Http\Controllers\FrontendControler::class,'userAlbum']);
Route::post('/follow',[\App\Http\Controllers\FollowControler::class,'followUnfollow'])->middleware('auth');;
Route::get('/profile',[\App\Http\Controllers\FollowControler::class,'profile']);
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
Route::get('/user/{id}',[\App\Http\Controllers\FollowControler::class,'userProfilePic'])->middleware('auth');
Route::post('profile-pic',[\App\Http\Controllers\FollowControler::class,'updateProfilePic'])->middleware('auth');
Route::post('bg-pic',[\App\Http\Controllers\FollowControler::class,'updatebgPic'])->middleware('auth');
Route::get('/user/bg/{id}',[\App\Http\Controllers\FollowControler::class,'userbgPic'])->middleware('auth');
Route::get('/{id}/category',[\App\Http\Controllers\FrontendControler::class,'albumCategory']);
