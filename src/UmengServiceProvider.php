<?php

namespace UmengPusher\Umeng;

use Illuminate\Support\ServiceProvider;
use UmengPusher\Umeng\Pusher\UmengPusher;

class UmengServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/config.php' => base_path('config/umeng.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('umeng',function($app){
            return new UmengPusher([
                env('umeng.ios_app_key'),
                env('umeng.ios_app_master_secret'),
                env('umeng.android_app_key'),
                env('umeng.android_app_master_secret'),
                env('umeng.production_mode'),
            ]);
        });
    }

    public function provides()
    {
        return ['umeng'];
    }
}
