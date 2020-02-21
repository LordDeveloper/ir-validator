<?php

namespace Jey\IrValidator;

use Illuminate\Support\ServiceProvider;

/**
 * Class IrValidatorServiceProvider
 * @package Jey\IrValidator
 */
class IrValidatorServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app['validator']->resolver(function($translator, $data, $rules) {
            return new IrValidator($translator, $data, $rules, $this->messages());
        });

    }

    /**
     *  Set the validator messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'national_code' => 'فیلد شماره‌ی ملی دربردارنده‌ی یک مقدار معتبر نمی‌باشد، لطفاً آن‌را بررسی و مجدداً وارد نمایید.',
            'iban' => 'فیلد شماره‌ی شبا دربردارنده‌ی یک مقدار معتبر نمی‌باشد، لطفاً آن‌را بررسی و مجدداً وارد نمایید.',
            'debit_card' => 'فیلد شماره‌ی حساب دربردارنده‌ی یک مقدار معتبر نمی‌باشد، لطفاً آن‌را بررسی و مجدداً وارد نمایید.',
            'postal_code' => 'فیلد کدپستی دربردارنده‌ی یک مقدار معتبر نمی‌باشد، لطفاً آن‌را بررسی و مجدداً وارد نمایید.',
        ];
    }

}
