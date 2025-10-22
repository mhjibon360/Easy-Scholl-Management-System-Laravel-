<?php

namespace App\Services;

use App\Models\Setting;
use Cache;

class SettingServices
{

    /**
     * get setting
     */

    public function getSettings()
    {
        return Cache::rememberForever('settings', function () {
           return Setting::pluck('value', 'key')->toArray();
        });
    }

    /**
     * set setttings
     */

    public function setSettings()
    {
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }

    /**
     * reset settings
     */
    public function resetSettings()
    {
        Cache::forget('settings');
    }
}
