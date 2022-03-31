<?php

namespace Modules\Common\Http\Controllers\Administratives;

use Illuminate\Http\Request;
use Modules\Common\Repositories\Administratives\WardRepository;
use Modules\Common\Validators\Administratives\WardValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Http\Response\JsonResponse;
use Vnnit\Core\Responses\BaseResponse;

class WardController extends CoreController
{
    public function __construct(WardRepository $repository, WardValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }

    public function chooseWard(Request $request)
    {
        $data = $this->repository->findByDistrictId($request->id);
        return JsonResponse::success($data);
    }
}
