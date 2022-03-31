<?php

namespace Modules\Sales\Entities\Orders;

use Vnnit\Core\Entities\BaseModel;

class OrdersModel extends BaseModel
{
    protected $table = 'orders';

    protected $fillable = [
        'name',
        'age'
    ];
}
