<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Music;
use Session;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }
    public function add(){
        $r=request();
        $addMusic=Music::create([
            'name'=>$r->musicName,
        ]);
        Session::flash('success',"Music Type create successfully!");
        Return view('addMusic');
    }
    public function view(){
        $viewMusic=Music::all(); //generate SQL SELECT * from category
        return view('showMusic')->with('music',$viewMusic);
    }
}
