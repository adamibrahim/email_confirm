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
        $this->loadMigrationsFrom( __DIR__.'/database');
        $this->loadRoutesFrom( __DIR__.'/routes/auth.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'emailConfirm');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'emailConfirm');

        $this->publishes([
            __DIR__.'/Models' => app_path(),
            __DIR__.'/resources/lang' => resource_path('lang/vendor/emailConfirm'),
            __DIR__.'/resources/views' => resource_path('views/vendor/emailConfirm'),
        ], 'emailConfirm');
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