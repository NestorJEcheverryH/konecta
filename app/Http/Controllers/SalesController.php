<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        $products = Product::all();
        return view('sales', [
            'sales' => $sales,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {

        $productUpdate = Product::find($request->producto_id);
        
        if ($productUpdate->cantidad < $request->cantidad) {
            echo "no es posible realizar la venta <br> La cantidad de venta supera la cantidad en stock <br><br> <a href='/products'>Volver</a>";
            return;
        }else{
            $newSale = new Sale();
            $newSale->producto_id = $request->producto_id;
            $newSale->cantidad = $request->cantidad;
            $newSale->save();

            $productUpdate->cantidad = $productUpdate->cantidad - $request->cantidad;
            $productUpdate->save();

            return redirect()->back();

        }
    }
}
