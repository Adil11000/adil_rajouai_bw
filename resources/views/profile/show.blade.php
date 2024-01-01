@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}'s Avatar">

                        <p><strong>Username:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Birthday:</strong> {{ $user->birthday }}</p>
                        <p><strong>About Me:</strong> {{ $user->biography }}</p>
                    </div>
            

                </div>
            </div>
        </div>
    </div>
@endsection
