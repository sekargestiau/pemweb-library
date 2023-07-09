<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('crud-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('isAdmin', function (User $user) {
            return $user->role == 'Admin';
        });

        Gate::define('isUser', function (User $user) {
            return $user->role == 'User';
        });
    }
}
