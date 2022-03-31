<?php

namespace Modules\Common\Repositories\Administratives;

use Modules\Common\Entities\Administratives\ProvinceModel;
use Vnnit\Core\Repositories\CoreRepository;

class ProvinceRepository extends CoreRepository
{
    // protected $presenterClass = ProvinceGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProvinceModel::class;
    }
}
