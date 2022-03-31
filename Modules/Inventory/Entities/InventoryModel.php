<?php

namespace Modules\Inventory\Entities;

use Vnnit\Core\Entities\BaseModel;

class InventoryModel extends BaseModel
{
    protected $table = 'inventory';

    protected $fillable = [
        'name',
        'age'
    ];
}
