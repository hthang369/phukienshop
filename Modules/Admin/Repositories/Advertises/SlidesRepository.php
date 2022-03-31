<?php

namespace Modules\Admin\Repositories\Advertises;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Advertises\SlidesModel;
use Modules\Admin\Forms\Advertises\SlidesForm;
use Modules\Admin\Grids\Advertises\SlidesGrid;
use Modules\Core\Repositories\BaseCoreRepository;
use Vnnit\Core\Support\FileManagementService;

class SlidesRepository extends BaseCoreRepository
{
    use SlidesCriteria;

    protected $imageColumnName = 'advertise_image';

    protected $presenterClass = SlidesGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SlidesModel::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return SlidesForm::class;
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

    public function formGenerate($route, $actionName, $config = [])
    {
        return parent::formGenerate($route, $actionName, ['enctype' => 'multipart/form-data']);
    }

    public function create(array $attributes)
    {
        $attributes['advertise_type'] = 'slide';
        return parent::create($attributes);
    }
}
