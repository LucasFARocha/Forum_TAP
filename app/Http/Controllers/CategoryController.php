<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function listAllCategories(Request $request){
        $categories = Category::all();

        return view('category.listAllCategories', ['topic' => $topics]);
    }

    // public function listCategoryByID(Request $request){
    //     $category = Category::where('id', $category_id)->first();

    //     return view('category.listCategoryByID', ['category' => $category]);
    // }
}
