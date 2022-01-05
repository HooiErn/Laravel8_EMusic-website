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
        $addSong=Song::create([
            'name'=>$r->songName,
            'musicID'=>$r->musicID,
            'artistID'=>$r->artistID,
            'albumID'=>$r->albumID,
            'description'=>$r->songDescription,
            'lyrics'=>$r->lyrics,
            'duration'=>$r->duration,
        ]);
        Session::flash('success',"Song create successfully!");
        Return redirect()->route('showSong');
    }
}
