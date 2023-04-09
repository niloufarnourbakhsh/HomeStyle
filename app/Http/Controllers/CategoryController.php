<?php

namespace App\Http\Controllers;

use App\Events\categoryCreatePhoto;
use App\Events\categoryDeletePhoto;
use App\Events\CategoryImageDelete;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->only('name'));

        event(new categoryCreatePhoto($request->image,$category));


        return redirect()->back();
    }

    public function delete(Category $category)
    {
        event(new categoryDeletePhoto($category->images));
        $category->delete();
        return redirect()->back();
    }

    public function edit(Request $request, Category $category)
    {
        $category->update(['name' => $request->category]);
        return redirect()->back();
    }
}
