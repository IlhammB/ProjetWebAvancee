<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request , $slug = null)
    {
        $sorting = $request->sortingBy;
        switch ($sorting) {
            case 'popularity':
                $sortField = 'id';
                $sortType = 'desc';
                break;
            case 'low-high':
                $sortField = 'price';
                $sortType = 'asc';
                break;
            case 'high-low':
                $sortField = 'price';
                $sortType = 'desc';
                break;
            default:
                $sortField = 'id';
                $sortType = 'asc';
                break;
        }
        $products = Product ::with('category');
        if(!is_null($slug)){
             
            $category = Category ::whereSlug($slug)->first();
            if (!is_null($category)) {
                $categoriesIds = Category ::whereCategoryId($category->id)->pluck('id')->toArray();
                $categoriesIds[] = $category ->id;

                $products = Product::whereHas('category', function($query) use ($categoriesIds){
                    $query ->whereIn('id',$categoriesIds );
                });
            }else {
                $products = $products->whereHas('category', function ($query) use ($slug) {
                    $query->where('slug' , $slug);
                });

            }

        }
        $products = $products->orderBy($sortField, $sortType) ->paginate(5);
        return view('frontend.shop.index', compact('products','sorting'));
    }

    public function tag(Request $request , $slug)
    {
        $sorting = $request->sortingBy;
        switch ($sorting) {
            case 'popularity':
                $sortField = 'id';
                $sortType = 'desc';
                break;
            case 'low-high':
                $sortField = 'price';
                $sortType = 'asc';
                break;
            case 'high-low':
                $sortField = 'price';
                $sortType = 'desc';
                break;
            default:
                $sortField = 'id';
                $sortType = 'asc';
                break;
        }

        $products = Product :: whereHas('tags', function ($query) use($slug) 
        {
            $query->where('slug' , $slug);
        })
        ->orderBy($sortField, $sortType)
        ->paginate(2);

        return view('frontend.shop.index',compact('products', 'sorting'));
    }
}
