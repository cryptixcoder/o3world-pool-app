@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row heading">
            <div class="col">
                <h3>Games</h3>
            </div>
            <div class="col button-container">
                <a class="btn btn-primary" href="{{ route('game.create') }}">New Game +</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            @include('partials.alerts')

            <table class="table table-light table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$games->isEmpty())
                            @foreach($games as $game)
                                <tr>
                                    <td>{{ $game->name }}</td>
                                    <td>
                                    
                                        @if(!$game->active && !$game->game_ended)
                                            Hasn't Started
                                        @endif

                                        @if($game->active && !$game->game_ended)
                                            In Progress
                                        @endif

                                        @if(!$game->active && $game->game_ended)
                                            Game Over
                                        @endif

                                    </td>
                                    <td>
                                        <ul class="nav">
                                            <li class="nav-item">
                                            <a class="nav-link" href="{{ route('game.show', ['game' => $game]) }}">View</a>
                                            </li>
                                            @if(!$game->active && !$game->game_ended)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('game.edit', ['game' => $game]) }}">Edit</a>
                                            </li>
                                            @endif

                                        </ul>
                                        
                                        
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">
                                    <p style="text-align:center;">There are currently no games. <a href="{{ route('game.create') }}">Create new game</a></p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $games->links() }}
            </div>
        </div>
    </div>
@stop