<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //全角スペースのみの場合エラー
        Validator::extend('space', function ($attribute, $value, $parameters, $validator) {
            if( mb_ereg_match("^(\s|　)+$", $value) ){
                return false;
            }else{
                return true;
            }
        });
        //入力文字数が指定の桁数（バイト）より大きい場合エラー
        Validator::extend('max_length', function ($attribute, $value, $parameters, $validator) {
            $validator->addReplacer('max_length', function ($message, $attribute, $rule, $parameters) {
                return str_replace([':max'], $parameters, $message);
            });
            return mb_strwidth($value) <= $parameters[0];
        });
    }
}
