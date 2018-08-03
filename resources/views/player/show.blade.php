@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            @include('partials.alerts')
                <img src="{{ asset($player->avatar) }}" alt="{{ $player->name }}'s Avatar" class="large-avatar" />
                <h1 class="player-name" align="center">{{ $player->name }}</h1>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:20px;">
            <div class="col-md-3">
                <h2 align="center">Wins</h2>
                <h1 align="center">{{ $player->wins }}</h1>
            </div>
            <div class="col-md-3">
                <h2 align="center">Losses</h2>
                <h1 align="center">{{ $player->losses }}</h1>
            </div>
        </div>
    </div>
@stop