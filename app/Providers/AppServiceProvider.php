<?php

namespace App\Providers;

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
        //
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

    public function register()
    {
      //User
      $this->app->bind(
        \App\Repositories\User\UserRepositoryInterface::class,
        \App\Repositories\User\UserRepository::class,
      );
    }
}
