<?php

namespace App\Providers;

use App\Contracts\Services\FileServiceInterface;
use App\Services\Media\FileService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FileServiceInterface::class, FileService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register helper files
        require_once app_path('Helpers/LayoutHelper.php');
        Paginator::useBootstrapFive();
    }
}
