<?php

namespace Modules\Api\Repositories;

use Modules\Core\Repositories\BaseCriteriaEloquent;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

trait NewsCriteria
{
    public function apply($model)
    {
        $columns = array_diff($model->getFillable(), ['post_content']);
        $builder = $model
            ->select(array_merge(['posts.id'], $columns, ['category_id', 'post_image']))
            ->leftJoin('post_categories', 'post_categories.post_id', '=', 'posts.id')
            ->leftJoin('post_images', 'post_images.post_id', '=', 'posts.id')
            ->where('post_type', 'news');
        return $builder; // TODO: Change the autogenerated stub
    }
}
