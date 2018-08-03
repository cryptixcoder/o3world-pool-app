@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row heading">
            <div class="col-md-8">
                <h3>Players</h3>
            </div>
            <div class="col-md-4 button-container">
                <a class="btn btn-primary" href="{{ route('player.create') }}">New Player +</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <table class="table table-light table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$players->isEmpty())
                            @foreach($players as $player)
                                <tr>
                                    <td>
                                        <img src="{{ asset($player->avatar) }}" class="avatar" alt="">{{ $player->name }}
                                    </td>
                                    <td>
                                        <ul class="nav">
                                            <li class="nav-item">
                                            <a class="nav-link" href="{{ route('player.show', ['player' => $player]) }}">View</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="{{ route('player.edit', ['player' => $player]) }}">Edit</a>
                                            </li>

                                        </ul>
                                        
                                        
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2">
                                    <p>There are currently no players. <a class="nav-link" href="{{ route('player.create') }}">Create new player</a></p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop