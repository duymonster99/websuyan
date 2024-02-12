<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu1;
use App\Models\Menu2;
use App\Models\Menu3;
use App\Models\Notify;
use Illuminate\Support\ServiceProvider;

class NavbarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('admin-page.index', function ($view) {
            $notifies = Notify::orderBy('created_at', 'desc')->take(4)->get();
            $view->with('notifies', $notifies);
        });

        view()->composer('index', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }
}
