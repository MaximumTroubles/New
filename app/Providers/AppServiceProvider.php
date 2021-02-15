<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();  
        View::share('shareCategories', Category::withCount('products')->having('products_count','>', 0)->get());    
        
    }
}
