@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">Username</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="form-group">
    <label for="email">Email</label>
    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input id="password" type="password" class="form-control" name="password">
</div>

<div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
</div>


                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday', $user->birthday) }}">
                            </div>

                            <div class="form-group">
                                <label for="biography">About Me</label>
                                <textarea id="biography" class="form-control" name="biography">{{ old('biography', $user->biography) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input id="avatar" type="file" class="form-control" name="avatar">
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
