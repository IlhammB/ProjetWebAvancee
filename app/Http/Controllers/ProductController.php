<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request, Product $product)
    {
      

        $related_products = Product::whereHas('category', function ($query) use ($product) {
            $query->whereId($product->category_id);
        })
            ->where('id', '<>', $product->id)
            ->inRandomOrder()
            ->take(4)
            ->get(['id', 'name', 'slug', 'price']);

        return view('frontend.product.show', compact('product', 'related_products'));
    }

    public function getProductDetail(Product $product){

        return response()->json([
            'status' => 200,
            'product' => $product,
        ]);

    }
}
