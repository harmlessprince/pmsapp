<?php

namespace App\Providers;

use App\Repositories\Eloquent\Contracts\EloquentRepositoryInterface;
use App\Repositories\Eloquent\Repository\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
