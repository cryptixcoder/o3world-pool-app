@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3>Edit Player</h3>
                <form action="{{ route('player.update', ['player' => $player]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Player Avatar</label>
                        <img src="{{ asset($player->avatar) }}" width="50" height="50" class="img-thumbnail" alt="player avatar">
                        <input type="file" name="avatar" id="avatar" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Player Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $player->name }}" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Player</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop