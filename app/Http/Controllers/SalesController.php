<?php

namespace App\Http\Controllers;

use App\Models\Sale;

class SalesController extends Controller
{
    public function index()
    {
        // eager load related order -> customer and order -> product
        $sales = Sale::with(['order.customer', 'order.product'])->get();

        return view('sales.index', compact('sales'));
    }
}
