<?php

namespace App\Providers;

use App\Models\Material;
use App\Models\Page;
use App\Models\Post;
use App\Policies\MaterialPolicy;
use App\Policies\PagePolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Page::class => PagePolicy::class,
        Material::class => MaterialPolicy::class,
        Post::class => PostPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('view-reports', fn ($user) => in_array($user->role, ['admin', 'leader'], true));
        Gate::define('manage-exclusive-resources', fn ($user) => in_array($user->role, ['admin', 'leader'], true));
    }
}
