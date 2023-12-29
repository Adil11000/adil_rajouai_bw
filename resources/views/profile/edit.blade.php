@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        
                        <form method="POST" href="/profile/edit/{{ Auth::id() }}">{{ __('Edit Profile') }}</a>

                            @csrf

                            <div class="form-group">
                                <label for="name">Username</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday', $user->birthday) }}">
                            </div>

                            <div class="form-group">
                                <label for="about">About Me</label>
                                <textarea id="about" class="form-control" name="about">{{ old('about', $user->about) }}</textarea>
                            </div>

                           

                            

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
