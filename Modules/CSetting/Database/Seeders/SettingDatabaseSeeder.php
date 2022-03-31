<?php

namespace Modules\CSetting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\CSetting\Entities\SettingDetailModel;
use Modules\CSetting\Entities\SettingModel;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addWidgetGroup();
    }

    public function addWidgetGroup()
    {
        $widgetConfig = [
            [
                'key' => 'group_navbar-top',
                'value' => json_encode(['xs' => 1, 'sm' => 2])
            ],
            [
                'key' => 'group_footer',
                'value' => json_encode(['xs' => 1, 'sm' => 4])
            ],
            [
                'key' => 'group_navbar-bottom',
                'value' => json_encode(['xs' => 1])
            ]
        ];

        $widgetGroup = [
            [
                'key' => 'group_navbar-top',
                'value' => json_encode(['slot_1', 'slot_2'])
            ],
            [
                'key' => 'group_footer',
                'value' => json_encode(['slot_1', 'slot_2','slot_3', 'slot_4'])
            ],
            [
                'key' => 'group_navbar-bottom',
                'value' => json_encode(['slot_1'])
            ]
        ];

        $config = resolve(SettingModel::class)->findOrCreate('widget_config');
        $setting = resolve(SettingModel::class)->findOrCreate('widget');
        SettingDetailModel::unguard();
        foreach($widgetConfig as $item) {
            $item['setting_id'] = $config->id;
            SettingDetailModel::create($item);
        }
        foreach($widgetGroup as $item) {
            $item['setting_id'] = $setting->id;
            SettingDetailModel::create($item);
        }
        SettingDetailModel::reguard();
    }
}
