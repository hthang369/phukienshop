<?php

namespace Modules\Admin\Http\Controllers\Roles;

use Illuminate\Http\Request;
use Modules\Admin\Repositories\RolesRepository;
use Modules\Admin\Validators\RolesValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class RolesController extends CoreController
{
    public function __construct(RolesRepository $repository, RolesValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::roles');
        $this->setRouteName('role');
        $this->setPathView([
            'create' => 'admin::roles.role_modal',
            'show' => 'admin::roles.role_modal',
            'update' => 'role.update',
            'store' => 'role.store',
            'destroy' => 'role.destroy',
        ]);
    }

    public function index()
    {
        list($data, $grid) = $this->repository->newDataGrid();
        return $this->renderViewData(compact('data', 'grid'), __FUNCTION__);
    }

    public function permissionRole(Request $request, $id)
    {

    }
}
