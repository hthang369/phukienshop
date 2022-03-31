<?php

namespace Modules\CSetting\Support;

use Modules\CSetting\Repositories\SettingBaseRepository;
use Modules\CSetting\Repositories\SettingRepository;

class SettingSupport
{
    public function get($setting, $settingDetail = null, $default = null)
    {
        if ($settingDetail) {
            return SettingBaseRepository::getDetail($setting, $settingDetail, $default);
        } else {
            return SettingBaseRepository::getSetting($setting);
        }
    }

    public function getAllSetting()
    {
        return resolve(SettingRepository::class)->allSettings();
    }

    public function getLocalTimezone()
    {
        return 'Asia/Ho_Chi_Minh';
    }
}
