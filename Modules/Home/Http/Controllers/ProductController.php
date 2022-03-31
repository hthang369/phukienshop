<?php

namespace Modules\Home\Http\Controllers;

use Modules\Home\Repositories\ProductRepository;
use Modules\Home\Validators\ProductValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class ProductController extends CoreController
{
    protected $permissionActions = [
        'index' => 'public',
        'showProduct' => 'public'
    ];

    public function __construct(ProductRepository $repository, ProductValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }

    public function showProduct($id, $slug)
    {
        $product = $this->repository->show($slug);
        $similarProduct = $this->repository->getSimilarProducts(data_get($product, 'categories_id', 0), $product->id);
        return $this->response->data(request(), compact('product', 'similarProduct'), 'home::products.index');
    }
}
