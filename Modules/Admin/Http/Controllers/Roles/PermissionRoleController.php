<?php

namespace Modules\Admin\Http\Controllers\Roles;

use Modules\Admin\Repositories\PermissionRoleRepository;
use Modules\Admin\Validators\PermissionRoleValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Permissions\Role;
use Vnnit\Core\Responses\BaseResponse;

class PermissionRoleController extends CoreController
{
    public function __construct(PermissionRoleRepository $repository, PermissionRoleValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::permission_roles');
        $this->setRouteName('role_has_permissions');
        $this->setPathView([
            'update' => 'role_has_permissions.update',
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $this->repository->role_id = $id;
        list($grid, $data) = $this->repository->allDataGrid();
        $role_id = $id;
        $name = Role::find($id, ['name'])->name;
        return $this->renderViewData(compact('data', 'grid', 'role_id', 'name'), __FUNCTION__);
    }
}
