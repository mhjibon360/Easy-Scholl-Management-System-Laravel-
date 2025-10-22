<?php

namespace App\Providers;

use App\Models\Setting;
use App\Services\SettingServices;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Setting::class, function () {
            return new SettingServices();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $settingss = $this->app->make(SettingServices::class);
        $settingss->setSettings();

        Config::set('mail.default', config('settings.mail_mailer'));

        Config::set('mail.mailers.smtp.host', config('settings.mail_host'));
        Config::set('mail.mailers.smtp.port', config('settings.mail_port'));
        Config::set('mail.mailers.smtp.username', config('settings.username'));
        Config::set('mail.mailers.smtp.password', config('settings.password'));

        Config::set('mail.from.address', config('settings.from_mail'));
        Config::set('mail.from.name', config('settings.from_mail_name'));

        // dd(config('mail.default'));
    }
}
