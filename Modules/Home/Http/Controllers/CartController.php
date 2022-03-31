<?php

namespace Modules\Home\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Modules\Admin\Repositories\ProductsRepository;
use Modules\Home\Repositories\CartRepository;
use Modules\Home\Validators\CartValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class CartController extends CoreController
{
    protected $listViewName = [
        'index' => 'home::carts.index'
    ];

    protected $permissionActions = [
        'index' => 'public',
        'addCart' => 'public',
        'updateCart' => 'public',
        'deleteCart' => 'public',
    ];

    public function __construct(CartRepository $repository, CartValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }

    public function index()
    {
        $bases = $this->repository->all();
        return $this->renderViewData($bases, __FUNCTION__);
    }

    public function addCart(Request $request)
    {
        $this->repository->addCart($request->input('product_id'));
        return $this->response->created($request, null, route('cart.index'));
    }

    public function updateCart(Request $request)
    {
        $this->repository->update($request->except(['rowId']), $request->input('rowId'));
        return $this->response->updated($request, null, route('cart.index'));
    }

    public function deleteCart(Request $request)
    {
        $this->repository->delete($request->input('rowId'));
        return $this->response->deleted($request, null, route('cart.index'));
    }
}
