<?php

namespace Modules\Sales\Http\Controllers\Promotions;

use Modules\Sales\Repositories\Promotions\PromotionsRepository;
use Modules\Sales\Validators\Promotions\PromotionsValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class PromotionsController extends CoreController
{
    public function __construct(PromotionsRepository $repository, PromotionsValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::promotions');
        $this->setRouteName('promotions');
        $this->setPathView([
            'create' => 'admin::promotions.promotion_modal',
            'show' => 'admin::promotions.promotion_modal',
            'update' => 'promotions.update',
            'store' => 'promotions.store',
            'destroy' => 'promotions.destroy',
        ]);
    }
}
