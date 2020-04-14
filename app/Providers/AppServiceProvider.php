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
        //第一引数：結合するクラス名
        //第二引数：インスタンスを返すコールバック関数
        $this->app->bind(
          \App\Repositories\User\UserRepositoryInterface::class,
          \App\Repositories\User\UserRepository::class

        );
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
