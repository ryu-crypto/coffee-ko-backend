<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function stats()
    {
        $totalProducts = Product::count();
        $inventoryCount = Product::sum('stock');
        $salesToday = Order::whereDate('created_at', Carbon::today())->sum('total');
        $pendingDeliveries = Order::where('status','pending')->count();

        // weekly revenue sample: last 7 days totals
        $last7 = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $sum = Order::whereDate('created_at', $date)->sum('total');
            $last7[] = [
                'date' => $date->format('D'),
                'total' => (float) $sum
            ];
        }

        // best sellers (by total qty in orders) - naive approach
        $best = DB::table('orders')->select(DB::raw('items'))
            ->get()
            ->pluck('items')
            ->flatten(1)
            ->filter()
            ->groupBy('name')
            ->map(function($items){ return $items->sum('quantity'); })
            ->sortDesc()
            ->take(5);

        return response()->json([
            'totalProducts'=>$totalProducts,
            'inventoryCount'=>$inventoryCount,
            'salesToday'=>$salesToday,
            'pendingDeliveries'=>$pendingDeliveries,
            'weekly'=>$last7,
            'bestSellers'=>$best
        ]);
    }
}
