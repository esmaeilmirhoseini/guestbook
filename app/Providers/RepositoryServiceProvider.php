<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Repositories\GuestbookRepository;
use App\Repositories\GuestbookRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            GuestbookRepositoryInterface::class, 
            GuestbookRepository::class
        );
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
