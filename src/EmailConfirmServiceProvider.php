<?php

namespace Adam\EmailConfirm;

use Illuminate\Support\ServiceProvider;

class EmailConfirmServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Controllers' => appp_path('Http/Controllers'),
            __DIR__.'/database' => database_path('migrations'),
            __DIR__.'/Jobs' => appp_path(),
            __DIR__.'/Models' => appp_path(),
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