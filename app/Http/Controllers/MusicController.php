<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Music;
use Session;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function add(){
        $r=request();
        $addMusic=Music::create([
            'name'=>$r->musicName,
        ]);
        Session::flash('success',"Music Type create successfully!");
        Return view('addMusic');
    }
}
