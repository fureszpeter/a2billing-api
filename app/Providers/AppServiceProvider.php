<?php

namespace A2billingApi\Providers;

use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\PDO::class, function () {
            return DB::connection(env('DB_A2B_DATABASE'))->getPdo();
        });
    }
}
