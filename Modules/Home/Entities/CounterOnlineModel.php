<?php

namespace Modules\Home\Entities;

use Vnnit\Core\Entities\BaseModel;

class CounterOnlineModel extends BaseModel
{
    protected $table = 'counter_online';

    public $timestamps = false;

    protected $fillable = [
        'counter',
        'date'
    ];

}
