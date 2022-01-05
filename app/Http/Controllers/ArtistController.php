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
        ]);
        Session::flash('success',"Artist create successfully!");
        Return view('addArtist');
    }
}
