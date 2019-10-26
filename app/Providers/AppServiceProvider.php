<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        Validator::extend('cs_date', function ($attribute, $value, $parameters, $validator) {

            $data = $validator->getData();
            // dd((int)$value);
            return (int) $value;
        }, 'Valor deve ser inteiro');
    }
}
