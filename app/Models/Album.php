<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable=['name','songID','artistID','coverImage','description','dateReleased'];
    public function song(){
        return $this->hasMany('App\Models\Song');
    }

    public function artist(){
        return $this->belongTo('App\Models\Artist');
    }
}