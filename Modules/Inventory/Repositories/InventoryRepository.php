<?php

namespace Modules\Inventory\Repositories;

use Modules\Inventory\Entities\InventoryModel;
use Vnnit\Core\Repositories\CoreRepository;

class InventoryRepository extends CoreRepository
{
    protected $presenterClass = InventoryGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return InventoryModel::class;
    }
}
