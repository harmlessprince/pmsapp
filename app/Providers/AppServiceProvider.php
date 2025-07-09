<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

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
        if($this->app->environment('production') || $this->app->environment('staging')) {
            \URL::forceScheme('https');
        }
        Model::preventLazyLoading(!app()->isProduction());
        Relation::enforceMorphMap([
            'user' => User::class,
        ]);
//        Paginator::defaultView('vendor.pagination.tailwind');
        Paginator::defaultView('vendor.pagination.custom');
    }
}
