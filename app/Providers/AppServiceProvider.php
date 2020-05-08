<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GuestbookServiceInterface;
use App\Services\GuestbookService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            GuestbookServiceInterface::class, 
            GuestbookService::class
        );

        $this->app->register(RepositoryServiceProvider::class);
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
