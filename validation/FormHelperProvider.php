<?php

namespace Digitonomy\Form\Validation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;

class FormHelperProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('notweekend', function ($attribute, $value, $parameters, $validator) {
            unset($attribute, $parameters, $validator);
            return (date('N', strtotime($value)) < 6);
        });
        Validator::extend('postcode', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^(([A-Z]{1,2}[0-9]{1,2}[ABEHJMNPRVWXY]?)\s?([0-9][A-Z]{2})|(GIR)\s?(0AA))$/i', $value) == 1;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
