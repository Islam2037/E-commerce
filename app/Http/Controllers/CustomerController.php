<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\order_detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function all()
    {
        $products=Product::all();
        return view("User.Home",compact("products"));
    }
    public function show($id)
    {
        $product=Product::findOrFail($id);
       return  view("User.show",compact("product"));
    }
    public function search(Request $request)
    {
        $key=$request->key;
        $product=Product::where('name','like',"%$key%")->get();
        return view("User.Home",compact("products"));
    }
    public function addToCard($id, Request $request)
    {
        $quantity=$request->quantity;

        $product=Product::findOrFail($id);
        $card=session()->get('card');
        if(!$card)
        {
            $card=[
                $id=>[
                    "name"=>$product->name,
                    "image"=>$product->image,
                    "price"=>$product->price,
                    "quantity"=>$product->quantity,

                ]
                ];
                session()->put('card',$card);
                return redirect()->back()->with("succsess","add to card succsessfully");



        }
        else{
            if(isset($card[$id]))
            {
                $card[$id]['quantity']=$quantity;
                session()->put('card',$card);
                return redirect()->back()->with("succsess","add to card succsessfully");

            }
            else
            {
                $card[$id]=[
                    "name"=>$product->name,
                    "image"=>$product->image,
                    "price"=>$product->price,
                    "quantity"=>$product->quantity,
                ];
                session()->put('card',$card);
                return redirect()->back()->with("succsess","add to card succsessfully");


            }
        }

    }
    public function showCard()
    {
        $products=session()->get('card');

        return view("User.cart",compact("products"));

    }
    public function makeOrder(Request $request)
    {
        $products=session()->get('card');
        if(!$products)
        {
            return redirect()->back();

        }
        $user_id=Auth::user()->id;
        $day=$request->requiredDate;
       $order= Order::create([
            'requiredDate'=>$day,
            'user_id'=>$user_id
        ]);
        foreach($products as $id=>$product)
        {
            order_detail::create([
                'product_id'=>$id,
                'order_id'=>$order->id,
                'name'=>$product['name'],
                'price'=>$product['price'],
                'quantity'=>$product['quantity']
            ]);
        }

        session()->put("card",[]);
        return redirect(url(""))->with("succsess","order maked succsessfully");

    }
    public function deleteProduct($id)
    {
        $products=session()->get('card');
        if($products[$id])
        {
            unset($products[$id]);
            session()->put('card',$products);
            return redirect()->back();


        }

    }
}
