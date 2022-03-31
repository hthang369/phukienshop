<?php

namespace Modules\Posts\Entities\Posts;

use Modules\Core\Entities\Posts\BasePostsModel;

class PostsModel extends BasePostsModel
{
    public function getCategoryIdAttribute()
    {
        return data_get(PostCategoriesModel::where('post_id', $this->id)->first(['category_id']), 'category_id');
    }
}
