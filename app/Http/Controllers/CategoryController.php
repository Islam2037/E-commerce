<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $categories=Category::all();
        return view("Admin.categories.create",compact("categories"));
    }
    public function store(Request $request)
    {
      //validatin,redirect

      $data=$request->validate([
        "name"=>"required|string",
        "desc"=>"required|string"
      ]);
      Category::create($data);
      return redirect(url("categories/create"))->with('succsess',"inserted is succsessfuly");
    }
    public function allCategories()
    {
        $categories=Category::all();
        return view("Admin.categories.all",compact("categories"));

    }

    public function show($id)
    {
        $category=Category::findOrFail($id);
        return view("Admin.categories.show",compact("category"));

    }

    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view("Admin.categories.edit",compact("category"));
    }
    public function update(Request $request,$id)
    {
      //validatin upload image,redirect

      $data=$request->validate([
        "name"=>"required|string",
        "desc"=>"required|string"
      ]);
      $category=Category::findOrFail($id);

      $category->update($data);
      return redirect(url("categories/show/$category->id"));
    }
    public function deleteProduct($id)
    {
        $product=Category::findOrFail($id);
        $product->delete();
        return redirect(url("categories"))->with('succsess',"deleted is succsessfully");


    }
}
