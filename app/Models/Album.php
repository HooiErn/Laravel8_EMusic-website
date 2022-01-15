<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable=['name','songID','artistName','coverImage','description','price','dataReleased'];
    public function album(){
        return $this->hasMany('App\Models\Song');
    }
}
