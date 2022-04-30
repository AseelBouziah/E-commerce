<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function cartList()
    {
        //$cart = session()->get('cart');
        $cart = [
            [
                "name" => 'Neutrogena',
                "quantity" => 1,
                "price" => 20,
            ],
            [
                "name" => 'Neutrogena',
                "quantity" => 1,
                "price" => 50,
            ]
        ];
        // dd($cart[0]);
        return view('pages.cart', $cart);
    }


    public function addToCart($id)
    {
        $product = Product::find($id);

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request,$id)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
      //  $product = session()->get('cart', $id);
       // session()->forget('product');

      //  $product->destroy($id);
    }
    public function checkout(Request $request,$id)
    {
       // $cart = session()->get('cart');
        //dd($cart[$id]["name"]);
      //  $this->sendOrder($id, $request);
        return view('pages.checkout')->with(compact(['id']));;

    }

    public function sendOrder($id,Request $request)
    {
       //  dd($cart[$id]["name"]);
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'address' => 'required',
            'contry' => 'required',
        ]);
        $cart = session()->get('cart');
        $order = new Order;
        $order->user_name = $request->input('fname');
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->product    = $cart[$id]["name"];
        $order->quantity = $cart[$id]["quantity"];
        $order->total_price = $cart[$id]["price"];
        if ($order->save()) {
            session()->forget('cart');
            return view('pages.thankyou');
        }

        return redirect()->back()->with(['fail' => 'Unable to add order.']);
    }
}
