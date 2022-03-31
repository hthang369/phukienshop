<?php

namespace Modules\Common\Entities\Commons;

use Vnnit\Core\Entities\BaseModel;

class CommonModel extends BaseModel
{
    protected $table = 'common';

    protected $fillable = [
        'name',
        'age'
    ];
}
