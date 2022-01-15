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
            'coverImage'=>$coverImage,
            'description'=>$r->songDescription,
            'price'=>$r->price,
            'dateReleased'=>$r->dataReleased,
        ]);
        Session::flash('success',"Album create successfully!");
        Return view('addAlbum');
    }
    public function view(){
        $viewAlbum=Album::all(); //generate SQL SELECT * from category
        return view('showAlbum')->with('albums',$viewAlbum);
    }
}
