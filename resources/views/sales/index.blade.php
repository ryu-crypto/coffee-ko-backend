@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Sales Records</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sale ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Sale Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->order->customer->name ?? 'N/A' }}</td>
                    <td>{{ $sale->order->product->name ?? 'N/A' }}</td>
                    <td>{{ $sale->order->quantity }}</td>
                    <td>₱{{ number_format($sale->amount, 2) }}</td>
                    <td>{{ $sale->sale_date->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No sales recorded yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
