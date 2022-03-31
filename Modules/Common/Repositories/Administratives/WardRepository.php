<?php

namespace Modules\Common\Repositories\Administratives;

use Modules\Common\Entities\Administratives\WardModel;
use Vnnit\Core\Repositories\CoreRepository;

class WardRepository extends CoreRepository
{
    // protected $presenterClass = WardGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return WardModel::class;
    }

    public function findByDistrictId($id)
    {
        $data = $this->findByField('district_id', $id)->pluck('name', 'id');

        return $this->service->chooseOptions($data, '=== Select Ward ===');
    }
}
