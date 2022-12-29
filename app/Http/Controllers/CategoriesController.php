<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $newCategory = new Category();
        $newCategory->nombre = $request->nombre;
        $newCategory->save();

        return redirect()->back();
    }

    public function update(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);
        $category->nombre = $request->nombre;
        $category->save();
        return redirect()->back();
    }

    public function delete(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();
        return redirect()->back();
    }
}
