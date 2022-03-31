<?php

namespace Modules\Common\Http\Controllers\Administratives;

use Illuminate\Http\Request;
use Modules\Common\Repositories\Administratives\DistrictRepository;
use Modules\Common\Validators\Administratives\DistrictValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Http\Response\JsonResponse;
use Vnnit\Core\Responses\BaseResponse;

class DistrictController extends CoreController
{
    public function __construct(DistrictRepository $repository, DistrictValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }

    public function chooseDistrict(Request $request)
    {
        $data = $this->repository->findByProvinceId($request->id);
        return JsonResponse::success($data);
    }
}
