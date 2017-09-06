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
        
        $this->android = new AndroidPusher($androidAppKey, $androidAppMasterSecret);
        $this->ios = new IOSPusher($iosAppKey, $iosAppMasterSecret);
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
