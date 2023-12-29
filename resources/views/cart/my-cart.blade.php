<!-- In resources/views/cart/my-cart.blade.php -->
@extends('layouts.app') <!-- Je moet mogelijk de layoutnaam aanpassen op basis van je configuratie -->

@section('content')
    <div class="container">
        <h2>My cart</h2>

        @if(count($cart) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Prijs</th>
                        <!-- Voeg andere kolommen toe indien nodig -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }}</td>
                            <!-- Voeg andere kolommen toe indien nodig -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Je winkelwagen is leeg.</p>
        @endif
    </div>
@endsection
