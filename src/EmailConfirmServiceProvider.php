<?php

namespace Adam\EmailConfirm;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class EmailConfirmServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->publishes([
            __DIR__.'/Controllers' => app_path('Http/Controllers'),
            __DIR__.'/database' => database_path('migrations'),
            __DIR__.'/Jobs' => app_path(),
            __DIR__.'/Models' => app_path(),
            __DIR__.'/resources/lang' => resource_path('lang'),
            __DIR__.'/resources/views' => resource_path('views'),
            __DIR__.'/routes' => 'routes',

        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}