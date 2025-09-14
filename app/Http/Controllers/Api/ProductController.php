<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // public endpoints
    public function index()
    {
        return Product::orderBy('category')->paginate(50);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    // admin endpoints (protected)
    public function store(Request $r)
    {
        $data = $r->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'stock'=>'nullable|integer',
            'category'=>'nullable|string',
            'description'=>'nullable|string',
            'image'=>'nullable|string'
        ]);
        $p = Product::create($data);
        return response()->json($p,201);
    }

    public function update(Request $r,$id)
    {
        $p = Product::findOrFail($id);
        $p->update($r->only(['name','price','stock','category','description','image']));
        return response()->json($p);
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(['message'=>'deleted']);
    }
}
