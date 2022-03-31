<?php

namespace Modules\Home\Repositories;

use Modules\Common\Entities\Products\ProductsModel;
use Vnnit\Core\Repositories\CoreRepository;

class ProductRepository extends CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductsModel::class;
    }

    public function show($id, $columns = [])
    {
        return parent::findByField('product_link', $id, $columns)->first();
    }

    public function getSimilarProducts($categoryId, $id)
    {
        return $this->model->select(['products.*'])
            ->join('product_categories', 'product_id', '=', 'products.id')
            ->whereBetween('category_id', $categoryId)
            ->where('products.id', '!=', $id)
            ->get();
    }
}
