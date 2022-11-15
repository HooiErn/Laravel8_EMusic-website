<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use DB;
use Session;

class ArtistController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }
    public function add(){
        $r=request();
        $addArtist=Artist::create([
            'name'=>$r->artistName,
        ]);
        Session::flash('success',"Artist create successfully!");
        Return view('addArtist');
    }

    public function view(){
        $viewArtist=Artist::all(); //generate SQL SELECT * from category
        return view('showArtist')->with('artists',$viewArtist);
    }
}