@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3>Create Player</h3>
                <form action="{{ route('player.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Player Avatar</label>
                        <input type="file" name="avatar" id="avatar" class="form-control-file" />
                    </div>
                    <div class="form-group">
                        <label>Player Name</label>
                        <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" />
                        @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create Player</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop