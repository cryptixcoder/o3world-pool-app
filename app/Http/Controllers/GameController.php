<?php

namespace App\Http\Controllers;

use App\Models\Game;
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
        return view('game.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $game = Game::create([
            'name' => $request->name
        ]);

        //Attach the challenger
        $game->user->attach($request->challenger, [
            'type' => 'challenger'
        ]);

        $game->user->attach($request->opponent, [
            'type' => 'opponent'
        ]);

        return redirect("/games/{$game->id}")->withSuccess('New game created!');

    }

    public function edit(Game $game){
        return view('game.edit', compact('game'));
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

    public function winner(Request $request, Game $game, Player $player){
        $game->players()->sync([$player->id => ['winner' => true]]);
        return response()->json(['success' => true]);
    }
}
