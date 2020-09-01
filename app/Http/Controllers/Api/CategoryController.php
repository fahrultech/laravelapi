<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
   
    public function index()
    {
        //
        $category = Category::all();
        return response()->json($category);
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, $this->rules(), $this->messages());
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
    }

    public function show($id)
    {
        //
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        //
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
    }

    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        return response()->json($category);
    }

    private function rules(){
        return [
            'category_name' => 'required'
        ];
    }

    private function messages(){
        return [
            'category_name.required' => 'Nama kategori harus diisi'
        ];
    }
}
