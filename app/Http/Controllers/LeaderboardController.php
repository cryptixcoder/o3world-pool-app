<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index(){

        $players = Player::orderBy('wins', 'desc')->get();


        return view('leaderboard', compact('players'));
    }
}
