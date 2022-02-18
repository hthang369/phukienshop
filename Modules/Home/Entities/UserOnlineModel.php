<?php

namespace Modules\Home\Entities;

use Vnnit\Core\Entities\BaseModel;

class UserOnlineModel extends BaseModel
{
    protected $table = 'useronline';

    public $timestamps = false;

    protected $fillable = [
        'tgtmp',
        'ip',
        'local',
        'time'
    ];

}
