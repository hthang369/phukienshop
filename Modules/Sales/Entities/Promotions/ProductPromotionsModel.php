<?php

namespace Modules\Sales\Entities\Promotions;

use Vnnit\Core\Entities\BaseModel;

class ProductPromotionsModel extends BaseModel
{
    protected $table = 'product_promotions';

    protected $fillable = [
        'product_id',
        'promotion_id'
    ];

}
