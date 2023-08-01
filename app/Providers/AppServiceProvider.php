<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
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
        // set the config for log-viewer on every boot so Opcodes\LogViewer reads the folders dynamically
        $filePaths = Cache::get('log_viewer_file_paths', []);
        Log::info('filePaths', $filePaths);
        app('config')->set('log-viewer.include_files', $filePaths);
    }
}
