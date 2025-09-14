<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Sale;

class OrderController extends Controller
{
    // Store order sent from customer system
    public function store(Request $request)
    {
        try {
            // ✅ Validate input
            $validated = $request->validate([
                'customer_id' => 'required|integer|exists:users,id',
                'product_id'  => 'required|integer|exists:products,id',
                'quantity'    => 'required|integer|min:1',
                'total_price' => 'required|numeric|min:0',
            ]);

            // ✅ Use DB transaction
            DB::beginTransaction();

            // Create the order
            $order = Order::create($validated);

            // Create the sale linked to the order
            $sale = Sale::create([
                'order_id'  => $order->id,
                'amount'    => $order->total_price,
                'sale_date' => now(),
            ]);

            DB::commit();

            return response()->json([
                'message' => '✅ Order and Sale saved successfully in admin',
                'order'   => $order,
                'sale'    => $sale,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => '❌ Failed to save order and sale',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
