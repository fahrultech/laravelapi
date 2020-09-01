<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;

class SubcategoryController extends Controller
{
 
    public function index()
    {
        //
        $subcategory = Subcategory::all();
        $data = array();
        foreach($subcategory as $d){
            $row = array();
            $row['id'] = $d->id;
            $row['subcategory_name']= $d->subcategory_name;
            $row['category_name'] = $d->category->category_name;
            $data[] =$row;
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, $this->rules(), $this->messages());
        $subcategory = new Subcategory;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
    }

    public function show($id)
    {
        //
        $subcategory = Subcategory::find($id);
        return response()->json($subcategory);
    }
   
    public function update(Request $request, $id)
    {
        //
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
    }

    public function destroy($id)
    {
        //
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
    }

    private function rules(){
        return [
            'subcategory_name' => 'required'
        ];
    }

    private function messages(){
        return [
            'subcategory_name.required' => 'Nama subkategori harus diisi'
        ];
    }
}
