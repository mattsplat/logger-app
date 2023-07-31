<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $filePaths = Cache::get('log_viewer_file_paths', []);
        app('config')->set('log-viewer.include_files', $filePaths);
    }
}
