<!-- In resources/views/contact.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
        @if($isAdmin)
            <h2>Received Messages</h2>
            @if(isset($messages))
                @foreach($messages as $message)
                    <p>Name: {{ $message->name }}</p>
                    <p>Email: {{ $message->email }}</p>
                    <p>Message: {{ $message->message }}</p>
                    <hr>
                @endforeach
            @else
                <p>Geen berichten beschikbaar.</p>
            @endif
        @else

        <form action="{{ route('contact.submit') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" class="form-control" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    @endif

@endsection
