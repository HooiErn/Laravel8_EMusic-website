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
        $addAlbum=Album::create([
            'name'=>$r->albumName,
        ]);
        Session::flash('success',"Album create successfully!");
        Return view('addAlbum');
    }
}
