<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        $categories=Category::all();
        return view("Admin.create",compact("categories"));
    }
    public function store(Request $request)
    {
      //validatin upload image,redirect

      $data=$request->validate([
        "name"=>"required|string",
        "desc"=>"required|string",
        "image"=>"required|image|mimes:jpg,png",
        "category_id"=>"required|integer|exists:categories,id",
        "price"=>"required|numeric",
        "quantity"=>"required|integer"
      ]);
      $data['image']=Storage::putFile("products",$data['image']);
      Product::create($data);
      return redirect(url("products/create"))->with('succsess',"inserted is succsessfuly");
    }
    public function allProducts()
    {
        $products=Product::all();
        return view("Admin.all",compact("products"));

    }
    public function show($id)
    {
        $product=Product::findOrFail($id);
        return view("Admin.show",compact("product"));

    }
    public function edit($id)
    {
        $product=Product::findOrFail($id);
        $categories=Category::all();
        return view("Admin.edit",compact("product","categories"));

    }

    public function update(Request $request,$id)
    {
      //validatin upload image,redirect

      $data=$request->validate([
        "name"=>"required|string",
        "desc"=>"required|string",
        "image"=>"image|mimes:jpg,png",
        "category_id"=>"required|integer|exists:categories,id",
        "price"=>"required|numeric",
        "quantity"=>"required|integer"
      ]);
      $product=Product::findOrFail($id);
      if($request->has('image'))
      {
        Storage::delete($product->image);
        $data['image']=Storage::putFile("products",$data['image']);
      }
      $product->update($data);
      return redirect(url("products/show/$product->id"));
    }
    public function deleteProduct($id)
    {
        $product=Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect(url("products"))->with('succsess',"deleted is succsessfully");


    }
}
