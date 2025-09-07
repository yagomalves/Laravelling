<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function createCategory()
    {

        return view('categories.create');
    }

    public function listCategories()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }


    public function storeCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');

        $category->save();

        return redirect()->route('categories.index');
        
    }


    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }

}
