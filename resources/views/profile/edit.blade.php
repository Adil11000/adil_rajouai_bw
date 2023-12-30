@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        
                        <form action="{{ route('profile.edit', $user->id) }}" method="POST" ></a>

                            @csrf

                            <div class="form-group">
                                <label for="name">Username</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ $user->birthday }}">
                            </div>

                            <div class="form-group">
                                <label for="about">About Me</label>
                                <textarea id="about" class="form-control" name="about" value="{{ $user->biography }}"></textarea>
                            </div>

                            <div>
                                <label for="avatar">Avatar</label>
                                <input id="avatar" type="file" class="form-control" name="avatar" value="{{ $user->avatar }}">
                            </div>

                           

                            

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
