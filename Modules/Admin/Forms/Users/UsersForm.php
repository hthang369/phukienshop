<?php

namespace Modules\Admin\Forms\Users;

use Spatie\Permission\Models\Role;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class UsersForm extends Form
{
    public function buildForm()
    {
        $usernameType = Field::TEXT;
        $emailType = Field::EMAIL;
        if (!is_null($this->model->id)) {
            if (!blank($this->model->username))
                $usernameType = Field::STATIC;
            $emailType = Field::STATIC;
        }
        $this
            ->add('username', $usernameType)
            ->add('password', Field::PASSWORD)
            ->add('name', Field::TEXT)
            ->add('email', $emailType)
            ->add('roles[]', Field::CHECKBOX_GROUP, [
                'label' => 'Roles',
                'value' => function($form, $value) {
                    return $value->pluck('level')->toArray();
                },
                'choices' => Role::pluck('name', 'level')->toArray()
            ]);
    }
}
