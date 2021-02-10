<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        } else {
            return redirect('/login');
        }
    }
}
