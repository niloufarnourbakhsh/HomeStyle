<?php

namespace App\Providers;

use App\Http\View\Composers\CategoriesComposer;
use App\Http\View\Composers\StatusesComposer;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.category.index','admin.products.*','shop.products','main','search'],CategoriesComposer::class);
        View::composer(['orders.*'],StatusesComposer::class);
    }
}
