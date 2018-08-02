<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(){
        $players = Player::paginate(15);

        return view('player.index', compact('players'));
    }

    public function show(Player $player){
        return view('player.show', compact('player'));
    }

    public function create(){
        return view('player.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $avatar = ($request->file('avatar')) ? $request->file('avatar')->store('uploads', 'public') : null;
            
        $player = Player::create([
            'name' => $request->name,
            'avatar' => $avatar
        ]);

        return redirect("/players/{$player->id}")->withSuccess('New player created');
    }

    public function edit(Player $player){
        return view('player.edit', compact('player'));
    }

    public function update(Request $request, Player $player){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $avatar = ($request->file('avatar')) ? $request->file('avatar')->store('uploads', 'public') : $player->avatar;
            
        $player->update([
            'name' => $request->name,
            'avatar' => $avatar
        ]);

        return redirect("/players/{$player->id}")->withSuccess("{$player->name}'s profile has been updated.");
    }
}
