<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view)
    {
        $view->with(Category::query()->with('images')->orderBy('name')->get());
    }

}
