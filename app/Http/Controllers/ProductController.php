<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products =  Product::all();

        return view('product', compact('products'));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);

        return view('detail', compact('product'));
    }

    public function search(Request $request)
    {
        $results = Product::where('name', 'like', '%' . $request->input('query') . '%')->get();
        return view('search', compact('results'));
    }

    public function addToCart(Request $request)
    {
        if(Session::has('user')) {
            $cart = new Cart();
            $cart->user_id = Session::get('user')['id'];
            $cart->product_id = $request->input('product_id');
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public static function cartItem()
    {
        if(Session::has('user')) {
            $userId = Session::get('user')['id'];
            return Cart::where('user_id', $userId)->count();
        } else {
            return 0;
        }
    }

    public function cartList()
    {
        $userId = Session::get('user')['id'];
        $products = Cart::join('products', 'cart.product_id', '=', 'products.id')
                    ->where('cart.user_id', $userId)
                    ->select('products.*', 'cart.id as cartId')
                    ->get();

        return view('cartlist', compact('products'));
    }

    public function removeCart($id)
    {
        $product = Cart::findOrFail($id);
        $product->delete();

        return redirect('/cartlist');
    }

    public function orderNow()
    {
        $userId = Session::get('user')['id'];
        $total = Cart::join('products', 'cart.product_id', '=', 'products.id')
                    ->where('cart.user_id', $userId)
                    ->sum('products.price');

        return view('ordernow', compact('total'));
    }

    public function orderPlace(Request $request)
    {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach($allCart as $cart) {
            $order = new Order();
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = 'pending';
            $order->payment_method = $request->payment;
            $order->payment_status = 'pending';
            $order->address = $request->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        return redirect('/');
    }
}
