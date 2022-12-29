<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $newProduct = new Product();
        $newProduct->nombre = $request->nombre;
        $newProduct->precio = $request->precio;
        $newProduct->peso = $request->peso;
        $newProduct->categoria_id = $request->categoria_id;
        $newProduct->cantidad = $request->cantidad;
        $newProduct->save();

        return redirect()->back();
    }

    public function update(Request $request, $productId)
    {
        $product = Product::find($productId);
        $product->nombre = $request->nombre;
        $product->precio = $request->precio;
        $product->peso = $request->peso;
        $product->categoria_id = $request->categoria_id;
        $product->cantidad = $request->cantidad;
        $product->save();

        return redirect()->back();
    }

    public function delete(Request $request, $productId)
    {
        $product = Product::find($productId);
        $product->delete();
        return redirect()->back();
    }
}
