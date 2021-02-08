<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Session;

class ProductsController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success-add-cart', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success-add-cart', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success-add-cart', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success-update-cart', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success-remove-cart', 'Product removed successfully');
        }
    }

    public function placeOrder() {
        $cart = session()->get('cart');

        if(!$cart) {
            return redirect()->back()->with('error-place-order', 'Cart is empty');
        }

        $cart = session()->get('cart');
        $amount = 0;

        foreach($cart as $c) {
            $amount += $c['quantity'] * $c['price'];
        }

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->amount = $amount;
        $order->save();

        foreach($cart as $id => $details) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $id;
            $order_item->quantity = $details['quantity'];
            $order_item->price = $details['price'];
            $order_item->save();
        }

        Session::forget('cart');

        return redirect()->to('/orders');
    }
}
