@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-3">📊 Sales Today</h2>

    <p class="lead">
        Total Sales Today:
        <strong>₱{{ number_format($totalSales ?? 0, 2) }}</strong>
    </p>

    @if( !isset($orders) || $orders->isEmpty() )
        <div class="alert alert-warning">No sales recorded today.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->customer_name ?? 'Guest' }}</td>
                        <td>₱{{ number_format($order->total ?? 0, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">⬅ Back to Dashboard</a>
</div>
@endsection
