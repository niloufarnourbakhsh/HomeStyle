<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Status;
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
        View::share('categories',Category::query()->with('images')->orderBy('name')->get());
        View::share('statuses',  Status::query()->get());
    }
}
