@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}'s Profile</div>

                    <div class="card-body">
                        <p><strong>Username:</strong> {{ $user->name }}</p>
                        <p><strong>Birthday:</strong> {{ $user->birthday }}</p>
                        <p><strong>About Me:</strong> {{ $user->biography }}</p>
                        <img src="{{ $user->avatar }}" alt="{{ $user->name }}'s Avatar">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
