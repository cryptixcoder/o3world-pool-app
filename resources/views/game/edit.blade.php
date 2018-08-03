@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="{{ route('game.update', ['game' => $game]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Game Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $game->name }}" />
                    </div>
                    <div class="form-group">
                        <label>Challenger</label>
                        <select name="challenger" id="challengerField" class="form-control">
                            <option value="">Select a challenger...</option>
                            @foreach($players as $player)
                                <option value="{{$player->id}}" @if(old('challenger') == $player->id) selected @endif>{{$player->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Opponent</label>
                        <select name="opponent" id="opponentField" class="form-control">
                            <option value="">Select a challenger...</option>
                            @foreach($players as $player)
                                <option value="{{$player->id}}" @if(old('opponent') == $player->id) selected @endif>{{$player->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create New Game</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
