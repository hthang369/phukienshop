<?php

namespace Modules\Posts\Repositories\Posts;

use Modules\Posts\Entities\Posts\PostImagesModel;
use Vnnit\Core\Repositories\CoreRepository;

class PostImagesRepository extends CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostImagesModel::class;
    }
}
