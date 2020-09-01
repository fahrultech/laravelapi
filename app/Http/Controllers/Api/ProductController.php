<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function index(Request $request){
        $product = Product::where('name', $request->search)->get();
        return response()->json($product);
    }

    public function show($id){
        $product = Product::find($id);
        return response()->json($product);
    }

    public function store(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->subcategory = $request->subcategory;
        $product->purchasing_price = $request->purchasing_price;
        $product->selling_price = $request->selling_price;
        $product->stock = $request->stock;
        $product->save();
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category = $request->category;
        $product->subcategory = $request->subcategory;
        $product->purchasing_price = $request->purchasing_price;
        $product->selling_price = $request->selling_price;
        $product->stock = $request->stock;
        $product->save();
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
    }
}
