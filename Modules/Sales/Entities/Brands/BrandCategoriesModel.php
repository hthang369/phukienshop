<?php

namespace Modules\Sales\Entities\Brands;

use Vnnit\Core\Entities\BaseModel;

class BrandCategoriesModel extends BaseModel
{
    protected $table = 'brand_categories';

    protected $fillable = [
        'brand_id',
        'category_id'
    ];

}
