<?php

namespace Modules\Admin\Validators\Users;

use Vnnit\Core\Validators\BaseValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\Admin\Validators;
 */
class UsersValidator extends BaseValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:150',
            'email' => 'required|email',
            'roles' => 'required'
        ],
        'change_password' => [
            'current_password' => 'required|password',
            'password' => 'required|current_password:api',
            'password_confirmation' => 'required|confirmed',
        ]
    ];
}
