<?php

namespace App\Providers;

use App\Interfaces\AuthenticationRepositoryInterface;
use App\Interfaces\ProfileSettingsRepositoryInterface;
use App\Repositories\AuthenticationRepository;
use App\Repositories\ProfileSettingsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings =[
        AuthenticationRepositoryInterface::class => AuthenticationRepository::class,
        ProfileSettingsRepositoryInterface::class => ProfileSettingsRepository::class
    ];
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
        //
    }
}
