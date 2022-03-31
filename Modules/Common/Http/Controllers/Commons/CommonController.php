<?php

namespace Modules\Common\Http\Controllers\Commons;

use Modules\Common\Repositories\Commons\CommonRepository;
use Modules\Common\Validators\Commons\CommonValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class CommonController extends CoreController
{
    public function __construct(CommonRepository $repository, CommonValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }
}
