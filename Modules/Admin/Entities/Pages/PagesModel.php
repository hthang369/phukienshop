<?php

namespace Modules\Admin\Entities\Pages;

use Vnnit\Core\Entities\BaseModel;

class PagesModel extends BaseModel
{
    protected $table = 'posts';

    protected $fillable = [
        'post_author',
        'post_title',
        'post_excerpt',
        'post_name',
        'post_date',
        'post_link',
        'post_content',
        'ob_title',
        'ob_desception',
        'ob_keyword',
        'post_status'
    ];

}
