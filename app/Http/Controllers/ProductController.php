<?php

namespace App\Http\Controllers;

use App\Events\ProductDelete;
use App\Events\ProductsImagesEvent;
use App\Http\Requests\ProductsCreateRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        if (\request()->category) {
            $products = Product::with('category')->whereHas('category', function ($query) {
                $query->where('name', \request()->category);
            });
        } else {
            $products = Product::query()->with(['category', 'images'])->take(12);
        }
        $products = $products->paginate(12);

        $categoryName = optional(Category::where(['name' => \request()->category])->first())->name ?
            Category::where(['name' => \request()->category])->first()->name
            : 'تمامی محصولات';
        $categories = Category::all();
        return view('admin.products.index')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('categoryName', $categoryName);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create')->with('categories', $categories);
    }

    public function store(ProductsCreateRequest $request)
    {
        $products = Product::create($request->only('name', 'category_id', 'details', 'description', 'count', 'price'));
        $images = $request->images;
        event(new ProductsImagesEvent($products, $images));
        return redirect()->back();
    }

    public function delete(Product $product)
    {
        if ($product->images) {
            event(new ProductDelete($product));
        }
        $product->delete();
        return redirect()->back();
    }

    public function edit(Product $product)
    {
        $product->with('images');
        $categories = Category::all();
        return view('admin.products.edit')->with('product', $product)->with('categories', $categories);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->only(['name', 'category_id', 'details', 'description', 'count', 'price']));
        $images = $request->images;
        event(new ProductsImagesEvent($product, $images));
        return redirect()->back();
    }

    public function show(Product $product)
    {
        $product->with('images');
        return view('shop.product')->with('product', $product);
    }

    public function search(SearchRequest $request)
    {
        $categories = Category::all();
        $query = $request->search;
        $products = Product::query()
            ->where('name', 'like', "%$query%")
            ->orWhere('details', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();
        return view('search')->with('products', $products)->with('categories', $categories);
    }
}
