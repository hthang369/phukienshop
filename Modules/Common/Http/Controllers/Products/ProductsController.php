<?php

namespace Modules\Common\Http\Controllers\Products;

use Modules\Common\Repositories\Products\ProductsRepository;
use Modules\Common\Validators\Products\ProductsValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class ProductsController extends CoreController
{

    public function __construct(ProductsRepository $repository, ProductsValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('common::products');
        $this->setRouteName('products');
        $this->setPathView([
            'create' => 'common::products.product_modal',
            'show' => 'common::products.product_modal',
            'update' => 'products.update',
            'store' => 'products.store',
            'destroy' => 'products.destroy',
        ]);
    }


}
