<?php

namespace Modules\Common\Entities\Administratives;

use Vnnit\Core\Entities\BaseModel;

class ProvinceModel extends BaseModel
{
    protected $table = 'provinces';

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'type',
        'code'
    ];
}
