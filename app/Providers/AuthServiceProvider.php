<?php

namespace App\Providers;

use App\Http\Livewire\Admin\Service;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Feedback;
use App\Model\Idea;
use App\Model\Location;
use App\Model\Order;
use App\Model\OrderEvaluation;
use App\Policies\MustBeOwnerPolicy;
use App\Policies\OpenViewPolicy;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Category::class => OpenViewPolicy::class,
        Comment::class => MustBeOwnerPolicy::class,
        Feedback::class => MustBeOwnerPolicy::class,
        Idea::class => MustBeOwnerPolicy::class,
        Location::class => OpenViewPolicy::class,
        Order::class => MustBeOwnerPolicy::class,
        OrderEvaluation::class => MustBeOwnerPolicy::class,
        Service::class => OpenViewPolicy::class,
        User::class => MustBeOwnerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Autoriza usuários administradores a fazer qualquer coisa no sistema
        Gate::before(function ($user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });
    }
}
