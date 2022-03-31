<?php

namespace Modules\Core\Entities\Posts;

use Vnnit\Core\Entities\BaseModel;

class BasePostsModel extends BaseModel
{
    protected $table = 'posts';

    protected $post_type = '';

    protected $fillable = [
        'author_id',
        'post_title',
        'post_excerpt',
        'post_name',
        'post_date',
        'post_link',
        'post_content',
        'ob_title',
        'ob_desception',
        'ob_keyword',
        'post_type',
        'post_status'
    ];
}
