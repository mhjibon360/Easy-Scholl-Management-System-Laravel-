<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Services\SettingServices;
use Artisan;

class SettingController extends Controller
{
    /**
     * settings view
     */
    public function setting()
    {
        return view('backend.pages.settings.settings');
    }

    /**
     * settings  update
     */
    public function generalsettingupdate(Request $request)
    {

        $validator = $request->validate([
            'software_name' => 'required'
        ]);

        // update or create
        foreach ($validator as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        // reset cache
        $settingss = app()->make(SettingServices::class);
        $settingss->resetSettings();

        // action with notification
        notyf()->info('Setting update success');
        return redirect()->back();
    }

    /**
     * smtp settings  update
     */
    public function smtpsettingupdate(Request $request)
    {

        $validator = $request->validate([
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'username' => 'required',
            'password' => 'required',
            'from_mail' => 'required',
            'from_mail_name' => 'required',
            'tls' => 'nullable',
        ]);

        // update or create
        foreach ($validator as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        // reset cache
        $settingss = app()->make(SettingServices::class);
        $settingss->resetSettings();

        // action with notification
        notyf()->info('SMTP Setting update success');
        return redirect()->back();
    }

    /**
     * maintenance mode up
     */
    public function maintenancemodeup(Request $request)
    {
        Artisan::call('up');

        // action with notification
        notyf()->info('Application is now live.');
        return redirect()->back();
    }
    /**
     * maintenance mode down
     */
    public function maintenancemodedown(Request $request)
    {
        Artisan::call('down');

        // action with notification
        // notyf()->info('Application is now live.');
        notyf()->info('Application maintenance start.');
        return redirect()->back();
    }
}
