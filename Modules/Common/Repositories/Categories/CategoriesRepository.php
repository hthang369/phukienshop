<?php

namespace Modules\Common\Repositories\Categories;

use Modules\Common\Entities\Categories\CategoriesModel;
use Modules\Common\Forms\Categories\CategoriesForm;
use Modules\Common\Grids\Categories\CategoriesGrid;
use Modules\Core\Repositories\BaseCoreRepository;
use Vnnit\Core\Repositories\FilterQueryString\Filters\WhereClause;

class CategoriesRepository extends BaseCoreRepository
{
    protected $presenterClass = CategoriesGrid::class;

    protected $filters = [
        'category_type' => WhereClause::class
    ];

    protected $except = ['category_type'];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoriesModel::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return CategoriesForm::class;
    }

    public function create(array $attributes)
    {
        if (!isset($attributes['category_status']))
            $attributes['category_status'] = 1;

        return parent::createNestedTree($attributes);
    }

    public function update(array $attributes, $id)
    {
        if (!isset($attributes['category_status']))
            $attributes['category_status'] = 1;

        return parent::updateNestedTree($attributes, $id);
    }

    public function getListOfLink()
    {
        return parent::pluck('category_name', 'id');
    }

    public function formGenerate($route, $actionName, $config = [])
    {
        return parent::formGenerate($route, $actionName, array_merge($config, ['type' => request('category_type')]));
    }

    public function allDataGrid()
    {
        return $this->allNestedDataGrid();
    }
}
