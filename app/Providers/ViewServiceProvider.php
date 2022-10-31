<?php

namespace App\Providers;

use App\View\Composers\CategoriesComposer;
use App\View\Composers\StatusesComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.category.index','admin.products.*','shop.products','main','search'],CategoriesComposer::class);
        View::composer(['orders.*'],StatusesComposer::class);
    }
}
