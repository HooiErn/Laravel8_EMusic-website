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

Route::get('/addMusic', function () {
    return view('addMusic');
});

Route::get('/addSong', function () {
    return view('addSong',['musicID'=>App\Models\Music::all()]);
});

Route::post('/addMusic/store',[App\Http\Controllers\MusicController::class,'add'])->name('addMusic');

Route::post('/addSong/store',[App\Http\Controllers\SongController::class,'add'])->name('addSong');

Route::get('/index', function () {
    return view('index');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

