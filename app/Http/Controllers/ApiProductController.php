<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Js;

class ApiProductController extends Controller
{
    public function all()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return response()->json(["msg" => "product not found"], 404);
        } else {
            return new ProductResource($product);
        }
    }
    public function store(Request $request)
    {

        $vaildator = Validator::make($request->all(), [
            "name" => "required|string",
            "desc" => "required|string",
            "image" => "required|image|mimes:jpg,png",
            "category_id" => "required|integer|exists:categories,id",
            "price" => "required|numeric",
            "quantity" => "required|integer"
        ]);
        if ($vaildator->fails()) {
            return response()->json(["errors" => $vaildator->errors()], 301);
        }
        $image = Storage::putFile("products", $request->image);
        Product::create([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $image,
            "category_id" => $request->category_id,
        ]);
        return response()->json(["msg" => "inserted is succsessfull"], 201);
    }
    public function edit($id, Request $request)
    {


        $vaildator = Validator::make($request->all(), [
            "name" => "required|string",
            "desc" => "required|string",
            "image" => "image|mimes:jpg,png",
            "category_id" => "required|integer|exists:categories,id",
            "price" => "required|numeric",
            "quantity" => "required|integer"
        ]);
        if ($vaildator->fails()) {
            return response()->json([$vaildator->errors()], 301);
        }

        $product = Product::find($id);
        if ($product == null) {
            return response()->json(["msg" => "product not found"], 404);
        }
        $imageName = $product->image;
        if ($request->has("image")) {
            Storage::delete($imageName);
            $imageName = Storage::putFile("products", $request->image);
        }
        $product->update([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $imageName,
            "category_id" => $request->category_id,

        ]);
        return response()->json(["msg" => "updated is sucsessfully", "product" => new ProductResource($product)], 201);
    }

    public function delete($id){
        $product=Product::find($id);
        if($product==null)
        {
            return response()->json(["msg" => "product not found"], 404);

        }
        Storage::delete($product->image);
        $product->delete();
        return response()->json(["msg" => "deleted is sucsessfully"], 201);


    }
}
