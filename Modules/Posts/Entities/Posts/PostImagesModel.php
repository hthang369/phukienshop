<?php

namespace Modules\Posts\Entities\Posts;

use Vnnit\Core\Entities\BaseModel;

class PostImagesModel extends BaseModel
{
    protected $table = 'post_images';

    protected $fillable = [
        'post_id',
        'post_image'
    ];

}
