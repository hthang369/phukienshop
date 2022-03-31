<?php

namespace Modules\Common\Repositories\Administratives;

use Modules\Common\Entities\Administratives\DistrictModel;
use Vnnit\Core\Repositories\CoreRepository;

class DistrictRepository extends CoreRepository
{
    // protected $presenterClass = DistrictGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DistrictModel::class;
    }

    public function findByProvinceId($id)
    {
        $data = $this->findByField('province_id', $id)->pluck('name', 'id');

        return $this->service->chooseOptions($data, '=== Select District ===');
    }
}
