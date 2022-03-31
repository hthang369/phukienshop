<?php

namespace Modules\Admin\Entities\Roles;

use Vnnit\Core\Permissions\Role;

class RolesModel extends Role
{
    protected $fillableColumns = ['*'];

    public function getFillableColumns()
    {
        return $this->fillableColumns;
    }
}
