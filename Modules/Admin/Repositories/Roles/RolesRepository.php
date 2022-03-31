<?php

namespace Modules\Admin\Repositories\Roles;

use Modules\Admin\Entities\Roles\RolesModel;
use Modules\Admin\Forms\Roles\RolesForm;
use Modules\Admin\Grids\Roles\RolesGrid;
use Modules\Core\Repositories\BaseCoreRepository;

class RolesRepository extends BaseCoreRepository
{
    use RolesCriteria;
    protected $presenterClass = RolesGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RolesModel::class;
    }

    public function form()
    {
        return RolesForm::class;
    }

    public function newDataGrid()
    {
        $this->scopeQuery(function ($model) {
            return $this->queryCountEmployee($model);
        });
        $data = parent::paginate();
        return [$data, $this->presenterGrid];
    }

    protected function getQuery()
    {
        $this->scopeQuery(function ($model) {
            return $this->queryCountEmployee($model);
        });
        return parent::getQuery();
    }

    protected function queryCountEmployee($model)
    {
        return $model->withCount('users');
    }
}
