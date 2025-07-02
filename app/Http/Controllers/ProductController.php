<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_table;
use App\Models\ProductDetail;


class ProductController extends Controller
{
    public function index()
    {
        $datafromDb = product_table::with('detail')->get(); // eager load details
        return view('product.productindex', ['product' => $datafromDb]);
    }

    public function create()
    {
        return view("product.productwithdata");
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'quantity' => 'required|numeric|min:0',
    ]);

    // Create product
    $newProduct = product_table::create([
        'name' => $validatedData['name'],
        'price' => $validatedData['price'],
    ]);

    // Create product detail linked to product
    ProductDetail::create([
        'product_id' => $newProduct->id,  
        'description' => $validatedData['description'],
        'quantity' => $validatedData['quantity'],
    ]);

    return redirect(route('product.index'));
}
    public function edit(product_table $product)
    {
        $product->load('detail'); // Load detail
        return view("product.edit", ['product' => $product]);
    }







    

public function update(product_table $product, Request $request) {
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'quantity' => 'required|numeric|min:0',
    ]);

    // 1. Update product basic info
    $product->update([
        'name' => $validatedData['name'],
        'price' => $validatedData['price'],
    ]);

    // 2. Update product detail only if it exists
    if ($product->detail) {
        $product->detail->update([
            'description' => $validatedData['description'],
            'quantity' => $validatedData['quantity'],
        ]);
    }

    return redirect()->route('product.index');
}



    public function delete(product_table $product)
    {
        $product->delete();
        return redirect(route('product.index'));
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $products = product_table::where('name', $name)->with('detail')->get();
        return view('product.productindex', ['product' => $products]);
    }
}
