<?php

namespace Modules\Home\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Home\Services\HomeServices;
use Modules\CSetting\Facade\Setting;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!in_array(request()->segment(1), ['admin', 'login'])) {
            $service = resolve(HomeServices::class);
            $allSetting = Setting::getAllSetting();
            View::composer('*', function($view) use($service, $allSetting) {
                $view->with('infoSettings', $allSetting->only(['info', 'home']));
            });
            View::composer('home::partial.header', function($view) use($service) {
                $view->with('menus', $service->getHeaderMenus());
            });
            View::composer('home::partial.footer', function ($view) use($service) {
                $view->with('footerMenu', $service->getFooterOurMenus());
                $view->with('footerOurMenu', $service->getFooterOurMenus());
            });
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
