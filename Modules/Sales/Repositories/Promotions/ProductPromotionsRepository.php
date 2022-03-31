<?php

namespace Modules\Sales\Repositories\Promotions;

use Vnnit\Core\Repositories\CoreRepository;

class ProductPromotionsRepository extends CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductPromotionsModel::class;
    }

}
