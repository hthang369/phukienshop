<?php

namespace Modules\News\Http\Controllers\News;

use Modules\News\Repositories\News\NewsRepository;
use Modules\News\Validators\News\NewsValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class NewsController extends CoreController
{
    public function __construct(NewsRepository $repository, NewsValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::news');
        $this->setRouteName('news');
        $this->setPathView([
            'create' => 'admin::news.news_modal',
            'show' => 'admin::news.news_modal',
            'update' => 'news.update',
            'store' => 'news.store',
            'destroy' => 'news.destroy',
        ]);
    }
}
