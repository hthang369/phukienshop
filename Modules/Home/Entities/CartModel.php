<?php

namespace Modules\Home\Entities;

use Vnnit\Core\Entities\BaseModel;

class CartModel extends BaseModel
{
    protected $table = 'cart';

    protected $fillable = [
        'name',
        'age'
    ];
}
