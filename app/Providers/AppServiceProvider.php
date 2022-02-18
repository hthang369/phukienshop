<?php

namespace App\Providers;

use App\Services\CommonService;
use Illuminate\Support\Facades\DB;
use Vnnit\Core\BaseServiceProvider;

class AppServiceProvider extends BaseServiceProvider
{
    protected $facades = [
        'common-service' => CommonService::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::connection()->enableQueryLog();
        // DB::listen(function($query) {
        //     QueryLogger::log($query);
        // });
    }
}
