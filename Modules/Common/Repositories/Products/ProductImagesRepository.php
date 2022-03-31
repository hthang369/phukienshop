<?php

namespace Modules\Common\Repositories\Products;

use Modules\Common\Entities\Products\ProductImagesModel;
use Vnnit\Core\Repositories\CoreRepository;

class ProductImagesRepository extends CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductImagesModel::class;
    }
}
