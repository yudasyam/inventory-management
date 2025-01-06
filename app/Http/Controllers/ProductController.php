<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);


        return redirect('/')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        //  dd($id);
        // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Tampilkan form edit dengan data produk
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {

        // dd($request);
        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Update data produk
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect('/')->with('success', 'Product updated successfully!');
    }
    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Hapus produk
        $product->delete();

        // Redirect ke halaman produk dengan pesan sukses
        return redirect('/')->with('success', 'Product deleted successfully!');
    }
}
