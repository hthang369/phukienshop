<?php

namespace Modules\Sales\Repositories\Brands;

use Vnnit\Core\Repositories\CoreRepository;

class BrandCategoriesRepository extends CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BrandCategoriesModel::class;
    }

}
