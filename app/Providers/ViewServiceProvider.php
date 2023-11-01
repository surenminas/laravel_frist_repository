<?php

namespace App\Providers;

// use Illuminate\View\View;
use App\View\Composers\PostComposer;
use App\View\Composers\UserComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('admin.includes.sidebar', PostComposer::class);
        View::composer('admin.includes.sidebar', UserComposer::class);


    }
}
