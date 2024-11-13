<?php

namespace App\Providers;

use App\Validation\Rules\PasswordCustom;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        PasswordCustom::defaults(function () {
            return PasswordCustom::min(8)
                ->mixedCase();
        });
        Schema::defaultStringLength(191);
    }
}
