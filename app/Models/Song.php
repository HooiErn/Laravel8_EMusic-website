<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable=['name','musicID','artistID','albumID','description','lyrics','duration'];
    public function Music(){
        return $this->belongsTo('App\Models\Music');
    }
    public function Artist(){
        return $this->belongsTo('App\Models\Artist');
    }
    public function Album(){
        return $this->belongsTo('App\Models\Album');
    }
}
