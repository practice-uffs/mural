<?php

namespace App\Providers;

use App\Auth\CredentialManager;
use App\Models\Comment;
use App\Models\Order;
use App\Observers\CommentObserver;
use App\Observers\OrderObserver;
use App\Services\Github;
use App\Services\GoogleDrive;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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

        $this->app->singleton(CredentialManager::class, function($app) {
            return new CredentialManager();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Blade::directive('admin', function($expression = null) {
            return '<?php if (auth()->check() && auth()->user()->isAdmin()): ?>';
        });

        Blade::directive('endadmin', function() {
            return '<?php endif; ?>';
        });

        Order::observe(OrderObserver::class);
        Comment::observe(CommentObserver::class);
    }
}
