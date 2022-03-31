<?php

namespace Modules\Common\Entities\Products;

use Vnnit\Core\Entities\BaseModel;

class ProductImagesModel extends BaseModel
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'product_image'
    ];

}
