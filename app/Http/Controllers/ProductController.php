<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','verified'])->except('cart');
    }
    public function index()
    {

        try {
            $products = Product::all();
        }catch (\Exception $e){
            $products = collect(new Product);
        }

        return view('products', ['products' => $products]);
    }

    /**
     * Simple as hell cart system. If I ever see you
     * code something like this for real you will
     * be fired over Skype on your birthday.
     *
     */
    public function cart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            about(404);
        };

        $cart = session()->get('cart');

        if(isset($cart[ $id ][ 'quantity' ]))
          $quantity = $cart[ $id ][ 'quantity' ] + 1;
        else
          $quantity = 1;

        $cart[ $id ] = [
            'name'     => $product->name,
            'quantity' => $quantity,
            'price'    => $product->price
        ];

        session()->put('cart', $cart);

        return 'success';
    }

    public function checkout()
    { 
        return view('checkout', ['items' => session()->get('cart')]);
    }

    /**
     *
     */
    public function specials()
    {
        return view ('specials');
    }

    public function allProducts()
    {
      $products = Product::all();

      return response()->json($products);
    }
}
