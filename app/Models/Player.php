<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'avatar',
        'wins',
        'losses'
    ];

    public function games(){
        return $this->belongsToMany(Game::class);
    }

    public function wonGames(){
        return $this->games()->wherePivot('winner', '=', true);
    }
}
