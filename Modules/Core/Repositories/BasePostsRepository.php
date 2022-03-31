<?php

namespace Modules\Core\Repositories;

abstract class BasePostsRepository extends BaseCoreRepository
{
    protected $type;

    public function getListOfLink()
    {
        return $this->model->where('post_type', $this->type)->pluck('post_title', 'id');
    }
}
