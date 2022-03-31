<?php

namespace Modules\CSetting\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class Setting
 * @package Modules\CSetting\Facade
 *
 * @method static string \Modules\CSetting\Support\SettingSupport get($setting, $settingDetail = null, $default = null)
 * @method static string \Modules\CSetting\Support\SettingSupport getLocalTimezone()
 */
class Setting extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'setting';
    }
}
