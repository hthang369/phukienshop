<?php

namespace Modules\News\Repositories\News;

use Modules\Core\Repositories\BasePostsRepository;
use Modules\News\Entities\News\NewsModel;
use Modules\News\Forms\News\NewsForm;
use Modules\News\Grids\News\NewsGrid;
use Vnnit\Core\Support\FileManagementService;

class NewsRepository extends BasePostsRepository
{
    use NewsCriteria;
    protected $type = 'news';

    protected $presenterClass = NewsGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NewsModel::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return NewsForm::class;
    }

    /**
     * Specify Service class name
     *
     * @return string
     */
    public function service()
    {
        return FileManagementService::class;
    }
}
