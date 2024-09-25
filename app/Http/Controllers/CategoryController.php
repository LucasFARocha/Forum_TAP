<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function listAllCategories(){
        $categories = Category::all();

        return view('category.listAllCategories', ['categories' => $categories]);
    }

    public function listCategoryByID($category_id){
        $category = Category::where('id', $category_id)->first();

        return view('category.listCategoryByID', ['category' => $category]);
    }
}
