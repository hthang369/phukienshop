<?php

namespace Modules\Admin\Entities\Advertises;

use Vnnit\Core\Entities\BaseModel;

class SlidesModel extends BaseModel
{
    protected $table = 'advertises';

    protected $fillable = [
        'advertise_name',
        'advertise_link',
        'advertise_image',
        'advertise_type',
        'sequence'
    ];
}
