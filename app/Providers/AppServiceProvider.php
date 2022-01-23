<?php

namespace App\Providers;

use App\Src\Instant\Domain\Contracts\InstantRepository;
use App\Src\Instant\Infrastructure\EloquentInstantRepository;
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
        $this->app->bind(InstantRepository::class, EloquentInstantRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
