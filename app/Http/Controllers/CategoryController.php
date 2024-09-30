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

    public function createCategory(Request $request){
        if($request->method() === 'GET')
        {
            return view('category.createCategory');
        }
        else
        {
            $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string|max:255',
            ]);
    
            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description
            ]);
            
            return redirect()->route('routeListAllCategories');
        }
    }

    public function editCategory(Request $request, $id){
        $category = Category::where('id', $id)->first();

        if($request->method() === 'GET'){
            return view('category.editCategory', ['category' => $category]);
        }
        else{
            if($request->title != ''){
                $request->validate(['title' => 'string|max:50']);
                $category->title = $request->title;
            }
            if($request->description != ''){
                $request->validate(['description' => 'string|max:255']);
                $category->description = $request->description;
            }
            $category->save();
            
            return redirect()
                ->route('routeListCategoryByID', [$category->id])
                ->with('message', 'Atualizado com sucesso!');
        }
    }

    public function deleteCategory(Request $request, $id){
        Category::where('id', $id)->delete();

        return redirect()
            ->route('routeListAllCategories')
            ->with('message', 'Excluído com sucesso!');
    }
}
