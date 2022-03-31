<?php

namespace Modules\Posts\Entities\Posts;

use Vnnit\Core\Entities\BaseModel;

class PostCategoriesModel extends BaseModel
{
    protected $table = 'post_categories';

    protected $fillable = [
        'post_id',
        'category_id'
    ];

}
