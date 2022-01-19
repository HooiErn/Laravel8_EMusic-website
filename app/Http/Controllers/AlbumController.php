<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Album;
use App\Models\Song;
use App\Models\Artist;
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
            'description'=>$r->albumDescription,
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
    public function edit($id){

        $albums=Album::all()->where('id',$id);
        
        return view('editAlbum')->with('albums',$albums)
        ->with('artistID',Artist::all())->with('songID',Song::all());
    }

    public function update(){
        $r=request();
        $albums = Album::find($r->albumID);

        if($r->file('coverImage')!=''){
            $coverImage->move('images',$coverImage->getClientOriginalName());                
            $imageName=$coverImage->getClientOriginalName();               
            $fileName=$songFile->getClientOriginalName();  
            $albums->coverImage=$fileName;
        } 

        $albums->name=$r->albumName;
        $albums->artistID=$r->artistID;
        $albums->description=$r->albumDescription;
        $albums->dateReleased=$r->dateReleased;
        $albums->songID=$r->songID;
        $albums->save();

        return redirect()->route('showAlbum');
    }
    public function delete($id){

        $deleteAlbum=Album::find($id);
        $deleteAlbum->delete();
        Session::flash('success',"Album was deleted successfully!");
        return redirect()->route('showAlbum');
    }
    public function viewAlbum(){
        $albums=DB::table('albums')
        ->leftJoin('artists','albums.artistID','=','artists.id')
        ->leftJoin('songs','albums.songID','=','songs.id')
        ->select('albums.*','artists.name as arName','songs.name as sName')
        ->get();
        return view('viewAlbum')->with('albums',$albums);
}

}