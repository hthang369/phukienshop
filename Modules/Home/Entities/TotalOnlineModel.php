<?php

namespace Modules\Home\Entities;

use Vnnit\Core\Entities\BaseModel;

class TotalOnlineModel extends BaseModel
{
    protected $table = 'tongonline';

    public $timestamps = false;

    protected $fillable = [
        'sum',
        'date'
    ];

}
