<?php

namespace Modules\Posts\Repositories\Posts;

use Modules\Posts\Entities\Posts\PostCategoriesModel;
use Vnnit\Core\Repositories\CoreRepository;

class PostCategoriesRepository extends CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostCategoriesModel::class;
    }

}
