<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Album;
use Session;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function add(){
        $r=request();
        $coverImage=$r->file('coverImage');        
        $coverImage->move('images',$coverImage->getClientOriginalName());   //images is the location                
        $imageName=$coverImage->getClientOriginalName(); 
        $addAlbum=Album::create([
            'name'=>$r->albumName,
            'artistID'=>$r->artistID,
            'songID'=>$r->songID,
            'coverImage'=>$imageName,
            'description'=>$r->songDescription,
            'dateReleased'=>$r->dataReleased,
        ]);
        Session::flash('success',"Album create successfully!");
        return redirect()->route('showAlbum');
    }
    public function view(){
        $viewAlbum=DB::table('albums')
        ->leftJoin('artists','albums.artistID','=','artists.id')
        ->leftJoin('songs','albums.songID','=','songs.id')
        ->select('albums.*','artists.name as arName','songs.name as sName')
        ->get();

        return view('showAlbum')->with('albums',$viewAlbum);
    }
}