<?php

namespace Modules\Sales\Http\Controllers\Shippings;

use Modules\Sales\Repositories\Shippings\ShippingRepository;
use Modules\Sales\Validators\Shippings\ShippingValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class ShippingController extends CoreController
{
    public function __construct(ShippingRepository $repository, ShippingValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::shipping');
        $this->setRouteName('shipping');
        $this->setPathView([
            'create' => 'admin::shipping.shipping_modal',
            'show' => 'admin::shipping.shipping_modal',
            'update' => 'shipping.update',
            'store' => 'shipping.store',
            'destroy' => 'shipping.destroy',
        ]);
    }
}
