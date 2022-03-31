<?php

namespace Modules\Common\Entities\Administratives;

use Vnnit\Core\Entities\BaseModel;

class DistrictModel extends BaseModel
{
    protected $table = 'districts';

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'province_id',
        'type'
    ];
}
