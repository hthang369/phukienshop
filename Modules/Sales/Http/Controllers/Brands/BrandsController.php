<?php

namespace Modules\Sales\Http\Controllers\Brands;

use Modules\Sales\Repositories\Brands\BrandsRepository;
use Modules\Sales\Validators\Brands\BrandsValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class BrandsController extends CoreController
{
    public function __construct(BrandsRepository $repository, BrandsValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::brands');
        $this->setRouteName('brands');
        $this->setPathView([
            'create' => 'admin::brands.brand_modal',
            'show' => 'admin::brands.brand_modal',
            'update' => 'brands.update',
            'store' => 'brands.store',
            'destroy' => 'brands.destroy',
        ]);
    }
}
