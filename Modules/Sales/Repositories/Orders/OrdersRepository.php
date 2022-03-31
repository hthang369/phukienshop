<?php

namespace Modules\Sales\Repositories\Orders;

use Modules\Sales\Entities\Orders\OrdersModel;
use Vnnit\Core\Repositories\CoreRepository;

class OrdersRepository extends CoreRepository
{
    // protected $presenterClass = OrdersGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrdersModel::class;
    }
}
