<?php

namespace App\Providers;

use App\Services\OpenAIService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(OpenAIService::class, function ($app) {
            return new OpenAIService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Laravel
        // Livewire::setScriptRoute(function ($handle) {
        //     return Route::get('/vendor/livewire/livewire.js', $handle);
        // });

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post(config('constants.PATH_TO_LARAVEl') . '/livewire/update', $handle);
        });
    }
}
