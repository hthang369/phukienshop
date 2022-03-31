<?php

namespace Modules\Sales\Http\Controllers\Orders;

use Modules\Sales\Repositories\Orders\OrdersRepository;
use Modules\Sales\Validators\Orders\OrdersValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class OrdersController extends CoreController
{
    public function __construct(OrdersRepository $repository, OrdersValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }
}
