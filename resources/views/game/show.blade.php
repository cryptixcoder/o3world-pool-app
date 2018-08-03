@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="game-title" align="center">{{ $game->name }}</h3>
            </div>
        </div>
        <div class="row justify-content-center">
        @foreach($game->players as $player)
            
                    <div class="col-md-3">
                        <a href="{{ route('player.show', ['player' => $player]) }}">
                            <img src="{{ asset($player->avatar) }}" style="width:150px; height: 150px; margin:0 auto; display:block;" alt="">
                        </a>
                        <h6 class="player-type" align="center">{{strtoupper($player->pivot->type)}}</h6>
                        <h4 class="player-name" align="center">{{$player->name}}</h4>
                        @if(!$game->game_ended && $game->active)
                            <div class="winner-box">
                                <a href="{{ route('game.winner', ['game' => $game, 'player' => $player]) }}" class="btn btn-primary btn-block">Mark Winner</a>
                            </div>
                            @else
                            @if($game->game_ended)
                               <h1 class="outcome-label">{{ ($player->pivot->winner == true) ? 'Winner' : 'Loser' }}</h1>
                            @endif
                        @endif
                    </div>
                @endforeach
        </div>
        @if(!$game->active && !$game->game_ended)
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <a href="{{ route('game.start',['game' => $game]) }}" class="start-game-btn btn btn-primary btn-block">Start Game</a>
                </div>
            </div>
        @endif
    </div>
@stop