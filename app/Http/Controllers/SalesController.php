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
        $rules = [
            'productSelect' => 'required', // Add more rules as needed
            'quantity' => 'required|numeric|min:1',
            'ucost' => 'required|numeric|min:0.01', // Assuming ucost cannot be zero
        ];

        // Validate the request data
        $validatedData = $request->validate($rules);
        $product = new ProductSale();
        $product->product_name = $request->productName;
        $product->product_qty = $request->quantity;
        $product->product_unit_cost = $request->ucost;
        $product->product_selling_price = $request->sellPrice;

        $product->save();

        return redirect()->route('coffee.sales');
    }
}
