<?php

namespace Modules\Common\Entities\Products;

use Vnnit\Core\Entities\BaseModel;

class ProductCategoriesModel extends BaseModel
{
    protected $table = 'product_categories';

    protected $fillable = [
        'product_id',
        'category_id'
    ];

}
