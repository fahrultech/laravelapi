<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function datatable(){

    }
    public function index(Request $request)
    {
        //
        $supplier = Supplier::where('name', $request->search)->get();
        return response()->json($supplier);        
    }

    public function store(Request $request)
    {
        //
        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->save();
    }

    public function show($id)
    {
        //
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    public function update(Request $request, $id)
    {
        //
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->save();
    }

    public function destroy($id)
    {
        //
        $supplier = Supplier::find($id);
        $supplier->delete();
    }
}
