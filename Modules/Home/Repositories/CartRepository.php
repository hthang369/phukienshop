<?php

namespace Modules\Home\Repositories;

use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Admin\Repositories\ProductsRepository;
use Modules\Home\Entities\CartModel;
use Vnnit\Core\Repositories\CoreRepository;

class CartRepository extends CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CartModel::class;
    }

    public function addCart($product_id)
    {
        $product = resolve(ProductsRepository::class)->find($product_id);
        $price = $product->promotion_price == 0 ? $product->product_price : $product->promotion_price;
        $cartItem = Cart::search(function($item) use($product_id) {
            return str_is($item->id, $product_id);
        })->first();
        if (is_null($cartItem))
            return Cart::add($product->id, $product->product_name, 1, $price, 0, ['image' => $product->product_image]);

        return Cart::update($cartItem->rowId, $cartItem->qty + 1);
    }

    public function all($columns = [])
    {
        return Cart::content();
    }

    public function update(array $attributes, $id)
    {
        return Cart::update($id, data_get($attributes, 'qty'));
    }

    public function delete($id)
    {
        Cart::remove($id);
        return true;
    }
}
