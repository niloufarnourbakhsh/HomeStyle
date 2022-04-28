<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{

    public function index()
    {
        if (\request()->category) {
            $products = Product::with('category')->whereHas('category', function ($query) {
                $query->where('name', \request()->category);
            });
        } else {
            $products = Product::query()->with('images')->take(12);
        }
        if (\request()->sort === 'high_to_low') {
            $products = $products->orderBy('price');
        } elseif (\request()->sort === 'low_to_high') {
            $products = $products->orderBy('price', 'Desc');
        }

        $products = $products->paginate(12);
        $categoryName = optional(Category::where(['name' => \request()->category])->first())->name ?
            Category::where(['name' => \request()->category])->first()->name
            : 'تمامی محصولات';

        $categories = Category::all();
        return view('shop.products')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('categoryName', $categoryName);

    }
}
