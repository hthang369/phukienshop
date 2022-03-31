<?php

namespace Modules\CSetting\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use Vnnit\Core\Validators\BaseValidator;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\CSetting\Validators;
 */
class WidgetValidator extends BaseValidator
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
