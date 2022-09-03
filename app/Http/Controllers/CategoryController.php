<?php

namespace App\Http\Controllers;


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
        $path = Storage::disk('public')->put('images', $request->image);
        $category->images()->create(['path' => $path]);
        return redirect()->back();
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

    public function edit(Request $request,Category $category)
    {
        $category->update(['name' => $request->category]);
        return redirect()->back();
    }
}
