<?php

namespace Modules\Common\Repositories\Products;

use Modules\Common\Entities\Products\ProductCategoriesModel;
use Vnnit\Core\Repositories\CoreRepository;

class ProductCategoriesRepository extends CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductCategoriesModel::class;
    }

    public function getDefaultCategory($columns = ['*'])
    {
        return $this->model->select($columns)
                ->join('categories', 'categories.id', '=', 'category_id')
                ->whereNotNull('parent_id')
                ->first();
    }
}
