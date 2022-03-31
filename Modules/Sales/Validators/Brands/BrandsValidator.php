<?php

namespace Modules\Sales\Validators\Brands;

use Vnnit\Core\Validators\BaseValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\Admin\Validators;
 */
class BrandsValidator extends BaseValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'brand_name' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'brand_name' => 'required'
        ],
    ];
}
