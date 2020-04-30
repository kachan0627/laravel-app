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
        //ユーザリポジトリバインド（結合）
        $this->app->bind(
          \App\Repositories\User\UserRepositoryInterface::class,
          \App\Repositories\User\UserRepository::class
        );
        //ツイートリポジトリバインド（結合）
        $this->app->bind(
          \App\Repositories\TweetsRepo\TweetsRepositoryInterface::class,
          \App\Repositories\TweetsRepo\TweetsRepository::class
        );
        //プロフィールリポジトリバインド
        $this->app->bind(
          \App\Repositories\Profile\ProfileRepositoryInterface::class,
          \App\Repositories\Profile\ProfileRepository::class
        );

        $this->app->bind(
          \App\Services\User\UserServiceInterface::class,
          \App\Services\User\UserService::class
        );
        $this->app->bind(
          \App\Services\Tweet\TweetServiceInterface::class,
          \App\Services\Tweet\TweetService::class
        );
        $this->app->bind(
          \App\Services\Profile\ProfileServiceInterface::class,
          \App\Services\Profile\ProfileService::class
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
