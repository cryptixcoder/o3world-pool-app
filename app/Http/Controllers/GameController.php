<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(){
        $games = Game::paginate(10);

        return view('game.index', compact('games'));
    }

    public function show(Game $game){
        return view('game.show', compact('game'));
    }

    public function create(){
        $players = Player::all();
        return view('game.create', compact('players'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $game = Game::create([
            'name' => $request->name
        ]);

        //Attach the challenger
        $game->players()->attach($request->challenger, [
            'type' => 'challenger'
        ]);

        $game->players()->attach($request->opponent, [
            'type' => 'opponent'
        ]);

        return redirect("/games/{$game->id}")->withSuccess('New game created!');

    }

    public function edit(Game $game){
        $players = Player::all();
        return view('game.edit', compact('game','players'));
    }
    
    public function update(Request $request, Game $game){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $game->update([
            'name' => $request->name
        ]);

        //Attach the challenger
        $game->user->attach($request->challenger, [
            'type' => 'challenger'
        ]);

        $game->user->attach($request->opponent, [
            'type' => 'opponent'
        ]);

        return redirect("/games/{$game->id}")->withSuccess('Game information has been updated.');
    }

    public function start(Game $game){
        $game->update([
            'active' => true
        ]);

        return redirect()->back();
    }

    public function winner(Request $request, Game $game, Player $player){
        $game->players()->updateExistingPivot($player->id, ['winner' => true]);

        $game->update([
            'active' => false,
            'game_ended' => true
        ]);

        foreach($game->players as $gamePlayer){
            if($gamePlayer->id == $player->id){
                $gamePlayer->update([
                    'wins' => $gamePlayer->wins + 1
                ]);
            }
            else{
                $gamePlayer->update([
                    'losses' => $gamePlayer->losses + 1
                ]);
            }
        }

        return redirect()->back();
    }
}
