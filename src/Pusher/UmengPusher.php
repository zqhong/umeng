<?php

namespace UmengPusher\Umeng\Pusher;

use Illuminate\Support\Arr;

class UmengPusher
{
    /**
     * @var AndroidPusher
     */
    private $android = null;

    /**
     * @var IOSPusher
     */
    private $ios = null;

    public function __construct(array $config)
    {
        $iosAppKey = Arr::get($config, 'umeng.ios_app_key');
        $iosAppMasterSecret = Arr::get($config, 'umeng.ios_app_master_secret');
        $androidAppKey = Arr::get($config, 'umeng.android_app_key');
        $androidAppMasterSecret = Arr::get($config, 'umeng.android_app_master_secret');
        $productionMode = Arr::get($config, 'umeng.production_mode');

        $this->android = new AndroidPusher($androidAppKey, $androidAppMasterSecret, $productionMode);
        $this->ios = new IOSPusher($iosAppKey, $iosAppMasterSecret, $productionMode);
    }

    public function android()
    {
        return $this->android;
    }

    public function ios()
    {
        return $this->ios;
    }
}
