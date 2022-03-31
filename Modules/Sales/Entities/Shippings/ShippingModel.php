<?php

namespace Modules\Sales\Entities\Shippings;

use Vnnit\Core\Entities\BaseModel;

class ShippingModel extends BaseModel
{
    protected $table = 'shipping';

    protected $fillable = [
        'province_id',
        'district_id',
        'ward_id',
        'shipping_amount'
    ];
}
