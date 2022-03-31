<?php

namespace Modules\Admin\Entities\Crawlers;

use Vnnit\Core\Entities\BaseModel;

class CrawlerPostNewsModel extends BaseModel
{
    protected $table = 'crawler_posts_news';

    protected $fillable = [
        'crawler_id',
        'post_id'
    ];
}
