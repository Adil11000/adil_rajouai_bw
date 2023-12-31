@extends('layouts.app')

@section('content')

<h1>promote existing users</h1>

@foreach ($users as $user)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            <!-- Toon de knop alleen als de huidige gebruiker admin is -->
            @can('promote', $user)
                <form action="{{ route('admin.users.promote', $user->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Promote to Admin</button>
                </form>
            @endcan
        </div>
    </div>
@endforeach

@endsection