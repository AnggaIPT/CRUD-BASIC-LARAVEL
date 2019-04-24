<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
   public function index(){
      $categories = Category::all();
      //dd($categories);
      return view('category.index',compact('categories'));
   }
   public function create(){
    return view('category.create');
   }
   public function store(){
      Category::create([
         'name' => request('name'),
         'slug' => str_slug(request('name'))
      ]);
      return redirect()->route('category.index');
   }
   public function edit(Category $category){
      return view('category.edit',compact('category'));
   }
   public function update(Category $category){
      $category->update([
         'name' => request('name'),
         'slug' => request('name')
      ]);

      return redirect()->route('category.index');
   }
   public function destroy(Category $category){
      $category->delete();
      return redirect()->route('category.index');
   }
}