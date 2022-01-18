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
    public function edit($id){

        $songs=Song::all()->where('id',$id);
        
        return view('editSong')->with('songs',$songs)
        ->with('artistID',Artist::all())->with('musicID',Music::all());
    }

    public function update(){
        $r=request();
        $songs = Song::find($r->songID);

        if($r->file('file')!=''){
            $songFile=$r->file('file');        
            $songFile->move('songmp3',$songFile->getClientOriginalName());   //images is the location                
            $fileName=$songFile->getClientOriginalName();  
            $songs->file=$fileName;
        } 

        $songs->name=$r->songName;
        $songs->artistID=$r->artistID;
        $songs->description=$r->songDescription;
        $songs->duration=$r->duration;
        $songs->lyrics=$r->lyrics;
        $songs->musicID=$r->musicID;
        $songs->save();

        return redirect()->route('showSong');
    }
    public function delete($id){

        $deleteSong=Song::find($id);
        $deleteSong->delete();
        Session::flash('success',"Song was deleted successfully!");
        return redirect()->route('showSong');
    }
    
    public function songdetail($id){
        $songs=Song::all()->where('id',$id);
        return view('songDetail')->with('songs',$songs);
    }

    public function viewSong(){
        $songs=DB::table('songs')
        ->leftJoin('artists','songs.artistID','=','artists.id')
        ->leftJoin('music','songs.musicID','=','music.id')
        ->select('songs.*','artists.name as arName','music.name as mName')
        ->get();
        return view('viewSong')->with('songs',$songs);
}

}