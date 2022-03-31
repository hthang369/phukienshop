<?php

namespace Modules\Common\Entities\Administratives;

use Vnnit\Core\Entities\BaseModel;

class WardModel extends BaseModel
{
    protected $table = 'wards';

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'district_id',
        'type'
    ];
}
