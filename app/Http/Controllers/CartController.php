<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session; // Ensure this line is present


class CartController extends Controller
{
    //  function index()
    //  {
    //      //return view('frontend.cart.index');
    //      return view('frontend.cart.index');
    //  }
    //  function index(Product $product)
    //  {
    //      //return view('frontend.cart.index');
    //      return view('frontend.cart.index', compact('product'));
    //  }
     //
    
     // ...

public function viewCart(Request $request)
{
    $productId = $request->input('product_id');
    $product = Product::find($productId);

    // Get the existing cart items from the session
    $cart = Session::get('cart', []);

    // Add the new product to the cart
    $cart[] = [
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1, // You can set the initial quantity to 1 or any other value
    ];

    // Store the updated cart back in the session
    Session::put('cart', $cart);

    // Pass the cart information to the view
    return view('frontend.cart.index', ['cart' => $cart, 'product' => $product]);
}
public function index(Request $request)
{
    // Get the existing cart items from the session
    $cart = Session::get('cart', []);

    // Retrieve the product if a product ID is provided
    $productId = $request->input('product_id');
    $product = $productId ? Product::find($productId) : null;

    // Pass the cart and product information to the view
    return view('frontend.cart.index', ['cart' => $cart, 'product' => $product]);
}
}
