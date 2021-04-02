<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Config\ConfigRepositoryInterface;
use App\Domain\Config\EloquentConfigRepository;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ConfigRepositoryInterface::class, EloquentConfigRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
