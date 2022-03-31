<?php

namespace Modules\CSetting\Entities;

class SettingModel extends SettingBaseModel
{
    protected $table = 'settings';

    protected $fillable = [
        'name'
    ];

    public function settingDetail()
    {
        return $this->hasMany(SettingDetailModel::class, 'setting_id');
    }

    public function findOrCreate($name)
    {
        if (!$result = $this->firstWhere('name', $name)) {
            $result = $this->create(compact('name'));
        }
        return $result;
    }
}
