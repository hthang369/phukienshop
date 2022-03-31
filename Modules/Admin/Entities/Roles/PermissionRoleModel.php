<?php

namespace Modules\Admin\Entities\Roles;

use Vnnit\Core\Entities\BaseModel;

class PermissionRoleModel extends BaseModel
{
    protected $table = 'role_has_permissions';

    protected $fillable = [
        'name',
        'age'
    ];
}
