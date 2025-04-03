<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('panel.products.index', compact('products'));
    }

    public function create()
    {
        return view('panel.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('panel.products.index')
                         ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('panel.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('panel.products.index')
                         ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('panel.products.index')
                         ->with('success', 'Product deleted successfully.');
    }

    public function searchProductAjax(Request $request)
    {
        $search = $request->get('q');
        $products = Product::where('name', 'LIKE', "%{$search}%")->get();
        return response()->json($products);
    }
}
