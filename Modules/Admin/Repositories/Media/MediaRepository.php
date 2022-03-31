<?php

namespace Modules\Admin\Repositories\Media;

use Modules\Admin\Entities\AdminModel;
use Modules\Core\Repositories\BaseCoreRepository;

class MediaRepository extends BaseCoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminModel::class;
    }

    public function formGenerate($route, $actionName, $config = [])
    {
        return parent::formGenerate($route, $actionName, ['enctype' => 'multipart/form-data']);
    }
}
