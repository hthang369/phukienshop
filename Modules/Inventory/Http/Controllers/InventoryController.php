<?php

namespace Modules\Inventory\Http\Controllers;

use Modules\Inventory\Repositories\InventoryRepository;
use Modules\Inventory\Validators\InventoryValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class InventoryController extends CoreController
{
    public function __construct(InventoryRepository $repository, InventoryValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }
}
