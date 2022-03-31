<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Facades\Breadcrumb;
use Modules\Admin\Services\Menus\MenuService;
use Vnnit\Core\Facades\Common;

class ComposerServiceProvider extends ServiceProvider
{
    protected $viewComposers = [
        \Modules\Admin\Http\ViewComposers\MenuComposer::class,
        \Modules\Admin\Http\ViewComposers\BreadcrumbComposer::class,
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            $view->with('sectionCode', Common::getSectionCode());
            $view->with('slidebar', resolve(MenuService::class)->getAdminSlidebars());
            $view->with('breadcrumb', Breadcrumb::toArray());
        });
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
