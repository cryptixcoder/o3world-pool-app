@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 align="center">Leader Board</h3>
                <table class="table leaderboard-table">
                    @foreach($players as $player)
                        <tr>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->wins }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@stop