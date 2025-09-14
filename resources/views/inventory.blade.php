@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold">📦 Inventory</h2>
    <p class="text-muted">Here you can see the ingredients needed for each product, organized by category.</p>

    {{-- ESPRESSO BLENDS --}}
    <div class="mt-5">
        <h3 class="fw-bold text-brown">Espresso Blends</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('images/americano.jpg') }}" class="card-img-top" alt="Americano">
                    <div class="card-body">
                        <h5 class="card-title">Americano</h5>
                        <p><strong>Price:</strong> ₱69 - ₱79</p>
                        <p><strong>Ingredients:</strong></p>
                        <ul>
                            <li>Espresso Shot</li>
                            <li>Hot Water</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('images/cappuccino.jpg') }}" class="card-img-top" alt="Cappuccino">
                    <div class="card-body">
                        <h5 class="card-title">Cappuccino</h5>
                        <p><strong>Price:</strong> ₱89 - ₱99</p>
                        <p><strong>Ingredients:</strong></p>
                        <ul>
                            <li>Espresso Shot</li>
                            <li>Steamed Milk</li>
                            <li>Foamed Milk</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SNACKS --}}
    <div class="mt-5">
        <h3 class="fw-bold text-brown">Snacks</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('images/solo_fries.jpg') }}" class="card-img-top" alt="Solo Fries">
                    <div class="card-body">
                        <h5 class="card-title">Solo Fries</h5>
                        <p><strong>Price:</strong> ₱55</p>
                        <p><strong>Ingredients:</strong></p>
                        <ul>
                            <li>Potatoes</li>
                            <li>Cooking Oil</li>
                            <li>Salt</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
