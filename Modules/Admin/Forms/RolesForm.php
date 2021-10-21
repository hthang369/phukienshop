<?php

namespace Modules\Admin\Forms;

use Spatie\Permission\Models\Role;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class RolesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('level', Field::TEXT)
            ->add('name', Field::TEXT)
            ->add('role_rank', Field::TEXT);
    }
}
