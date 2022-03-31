<?php

namespace Modules\Common\Repositories\Commons;

use Modules\Common\Entities\Commons\CommonModel;
use Modules\Common\Grids\Commons\CommonGrid;
use Vnnit\Core\Repositories\CoreRepository;

class CommonRepository extends CoreRepository
{
    protected $presenterClass = CommonGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CommonModel::class;
    }
}
