<?php

namespace Modules\Admin\Validators;

use Vnnit\Core\Validators\BaseValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\Admin\Validators;
 */
class PermissionRoleValidator extends BaseValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        ],
        ValidatorInterface::RULE_UPDATE => [
        ],
    ];
}
