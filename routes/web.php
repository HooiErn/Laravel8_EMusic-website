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
    return view('addSong',['musicID'=>App\Models\Music::all()],['artistID'=>App\Models\Artist::all()]);
});

Route::get('/addArtist',function(){
    return view('addArtist');
});

Route::get('/addAlbum',function(){
    return view('addAlbum',['songID'=>App\Models\Song::all()],['artistID'=>App\Models\Artist::all()]);
});

Route::get('/showAlbum',[App\Http\Controllers\AlbumController::class,'view'])->name('showAlbum');


Route::post('/addMusic/store',[App\Http\Controllers\MusicController::class,'add'])->name('addMusic');

Route::post('/addSong/store',[App\Http\Controllers\SongController::class,'add'])->name('addSong');

Route::post('/addArtist',[App\Http\Controllers\ArtistController::class,'add'])->name('addArtist');

Route::post('/addAlbum',[App\Http\Controllers\AlbumController::class,'add'])->name('addAlbum');

Route::get('/showSong',[App\Http\Controllers\SongController::class,'view'])->name('showSong');

Route::get('/showMusic',[App\Http\Controllers\MusicController::class,'view'])->name('showMusic');

Route::get('/showArtist',[App\Http\Controllers\ArtistController::class,'view'])->name('showArtist');

Route::get('/editSong/{id}',[App\Http\Controllers\SongController::class,'edit'])->name('editSong');

Route::post('/updateSong',[App\Http\Controllers\SongController::class,'update'])->name('updateSong');
Route::get('/index', function () {
    return view('index');
});
Route::get('/deleteSong/{id}',[App\Http\Controllers\SongController::class,'delete'])->name('deleteSong');

Route::get('/deleteAlbum/{id}',[App\Http\Controllers\AlbumController::class,'delete'])->name('deleteAlbum');

Route::get('/editAlbum/{id}',[App\Http\Controllers\AlbumController::class,'edit'])->name('editAlbum');

Route::post('/updateAlbum',[App\Http\Controllers\AlbumController::class,'update'])->name('updateAlbum');

Route::get('/songs',[App\Http\Controllers\SongController::class,'viewSong'])->name('viewSong');

Route::get('/albums',[App\Http\Controllers\AlbumController::class,'viewAlbum'])->name('viewAlbums');

Route::get('/songDetail/{id}',[App\Http\Controllers\SongController::class,'indexSong'])->name('view.song');

Route::post('/songs',[App\Http\Controllers\SongController::class,'searchSong'])->
name('search.song');

Route::get('/index', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');