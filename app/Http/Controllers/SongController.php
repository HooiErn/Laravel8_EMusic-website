<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Music;
use App\Models\Artist;
use App\Models\Album;
use Session;

class SongController extends Controller
{
    public function add(){
        $r=request();
        $songFile=$r->file('file');        
        $songFile->move('songmp3',$songFile->getClientOriginalName());   //images is the location                
        $fileName=$songFile->getClientOriginalName();   
        $addSong=Song::create([
            'name'=>$r->songName,
            'musicID'=>$r->musicID,
            'artistID'=>$r->artistID,
            'description'=>$r->songDescription,
            'lyrics'=>$r->lyrics,
            'duration'=>$r->duration,
            'file'=>$fileName,
        ]);
        Session::flash('success',"Song create successfully!");
        return redirect()->route('showSong');
    }

    public function view(){
        $viewSong=DB::table('songs')
        ->leftJoin('artists','songs.artistID','=','artists.id')
        ->leftJoin('music','songs.musicID','=','music.id')
        ->select('songs.*','artists.name as arName','music.name as mName')
        ->get();

        return view('showSong')->with('songs',$viewSong);
    }

}