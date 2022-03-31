<?php

namespace Modules\Common\Http\Controllers\Administratives;

use Modules\Common\Repositories\Administratives\ProvinceRepository;
use Modules\Common\Validators\Administratives\ProvinceValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class ProvinceController extends CoreController
{
    public function __construct(ProvinceRepository $repository, ProvinceValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }
}
