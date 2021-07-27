<?php

namespace App\Providers;

use App\Services\Github;
use App\Services\GoogleDrive;
use Illuminate\Support\Facades\Blade;
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
        $this->app->singleton(Github::class, function($app) {
            return new Github(config('github'));
        });

        $this->app->singleton(GoogleDrive::class, function($app) {
            return new GoogleDrive(config('google.drive'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('admin', function($expression = null) {
            return '<?php if (auth()->check() && auth()->user()->isAdmin()): ?>';
        });

        Blade::directive('endadmin', function() {
            return '<?php endif; ?>';
        });
    }
}
