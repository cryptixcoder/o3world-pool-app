<?php

namespace App\Models;

use App\Models\Player;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'active',
        'game_ended'
    ];

    public function players(){
        return $this->belongsToMany(Player::class)->withPivot('type', 'winner');
    }
}
