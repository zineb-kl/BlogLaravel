<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{ 
    
    public function index()
    {
        $categories=Category::all();
        return view ('categories.category-index',compact('categories'));

    }

     public function create()
    {
        
        return view ('categories.category-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:categories',
            /* 'category_id' => 'required'*/
        ]);

       $name = $request->input('name');
      /* // $category_id = $request->input('category_id');*/
       $category = new Category();
       $category->name = $name;
       /*$post->category_id = $category_id;*/
       $category->save();
       
       return redirect()->back()->with('status', 'Category Created Successfully');

    }

    public function edit(Category $category)
    {
        return view ('categories.category-edit',compact('category'));
    }


    public function update( Request $request ,Category $category)
    {
        $request->validate([
            'name' => 'required | unique:categories',
            /* 'category_id' => 'required'*/
        ]);

       $name = $request->input('name');
      /* // $category_id = $request->input('category_id');*/
      
       $category->name = $name;
       /*$post->category_id = $category_id;*/
       $category->save();
       
       return redirect(route('categories-index'))->with('status', 'Category Edited Successfully');


    }


    public function destroy(Category $category)
    {
     $category->delete();
     return redirect()->back()->with('status', 'Post Delete  Successfully');
   

    }
    
   
}
