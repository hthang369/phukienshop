<?php

namespace Modules\Admin\Http\Controllers\Advertises;

use Modules\Admin\Repositories\SlidesRepository;
use Modules\Admin\Validators\SlidesValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class SlidesController extends CoreController
{
    public function __construct(SlidesRepository $repository, SlidesValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::slides');
        $this->setRouteName('slides');
        $this->setPathView([
            'create' => 'admin::slides.slide_modal',
            'show' => 'admin::slides.slide_modal',
            'update' => 'slides.update',
            'store' => 'slides.store',
            'destroy' => 'slides.destroy',
        ]);
    }
}
