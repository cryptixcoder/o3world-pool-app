@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row heading">
            <div class="col-md-8">
                <h3>Games</h3>
            </div>
            <div class="col-md-4 button-container">
                <a class="btn btn-primary" href="{{ route('game.create') }}">New Game +</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
                                    <td>{{ ($game->active) ? "Active" : "Pending" }}</td>
                                    <td>
                                        <ul class="nav">
                                            <li class="nav-item">
                                            <a class="nav-link" href="{{ route('game.show', ['game' => $game]) }}">View</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="{{ route('game.edit', ['game' => $game]) }}">Edit</a>
                                            </li>

                                        </ul>
                                        
                                        
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">
                                    <p>There are currently no games. <a class="nav-link" href="{{ route('game.create') }}">Create new game</a></p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop