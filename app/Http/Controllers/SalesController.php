<?php

namespace App\Http\Controllers;

use App\Models\ProductSale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function SaleIndex()
    {
        $collection = ProductSale::all();
        return view('coffee_sales', compact('collection'));

    }

    public function AddSales(Request $request)
    {
        //return $request;
        $product = new ProductSale();
        $product->product_name = $request->productName;
        $product->product_qty = $request->quantity;
        $product->product_unit_cost = $request->ucost;
        $product->product_selling_price = $request->sellPrice;

        $product->save();

        return redirect()->route('coffee.sales');
    }
}
