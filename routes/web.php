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

Route::get('/songs',[App\Http\Controllers\SongController::class,'view'])->name('showSong');

Route::get('/showMusic',[App\Http\Controllers\MusicController::class,'view'])->name('showMusic');

Route::get('/showArtist',[App\Http\Controllers\ArtistController::class,'view'])->name('showArtist');

Route::get('/showAlbum',[App\Http\Controllers\AlbumController::class,'view'])->name('showAlbum');

Route::get('/index', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');