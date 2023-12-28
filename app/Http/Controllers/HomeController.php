<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index ()
   {
      $products = Product::with('category')->get(['id','name', 'price','slug']);

      return view('frontend.homepage', compact('products'));
   }

   public function search(Request $request)
   {
    $query = $request->input('query');

    // Vérifiez si la requête est vide ou non
    if (!empty($query)) {
        // Recherchez les produits dont le nom commence par la première lettre spécifiée
        $products = Product::where('name', 'like', $query . '%')->get();
    } else {
        // Si la requête est vide, vous pouvez choisir de retourner tous les produits ou un message indiquant de spécifier une lettre.
        $products = Product::all();
    }

    return view('frontend.search', compact('products', 'query'));
   }
}
