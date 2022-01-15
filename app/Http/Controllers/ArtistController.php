<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Artist;
use Session;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function add(){
        $r=request();
        $addArtist=Artist::create([
            'name'=>$r->artistName,
            'songID'=>$r->songID,
            'albumID'=>$r->albumID,
            'description'=>$r->songDescription,
        ]);
        Session::flash('success',"Artist create successfully!");
        Return view('addArtist');
    }
    public function view(){
        $viewArtist=Artist::all(); //generate SQL SELECT * from category
        return view('showArtist')->with('artists',$viewArtist);
    }
}
