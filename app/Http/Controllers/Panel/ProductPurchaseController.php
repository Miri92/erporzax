<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\ProductPurchase;
use Illuminate\Http\Request;

class ProductPurchaseController extends Controller
{
    public function index()
    {
        $productPurchases = ProductPurchase::all();
        return view('panel.product_purchases.index', compact('productPurchases'));
    }

    public function create()
    {
        return view('panel.product_purchases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ProductPurchase::create($request->all());

        return redirect()->route('product_purchases.index')
                         ->with('success', 'Product Purchase created successfully.');
    }

    public function edit(ProductPurchase $productPurchase)
    {
        return view('panel.product_purchases.edit', compact('productPurchase'));
    }

    public function update(Request $request, ProductPurchase $productPurchase)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $productPurchase->update($request->all());

        return redirect()->route('product_purchases.index')
                         ->with('success', 'Product Purchase updated successfully.');
    }

    public function show(ProductPurchase $productPurchase)
    {
        return view('panel.product_purchases.show', compact('productPurchase'));
    }

    public function destroy(ProductPurchase $productPurchase)
    {
        $productPurchase->delete();

        return redirect()->route('product_purchases.index')
                         ->with('success', 'Product Purchase deleted successfully.');
    }
}
