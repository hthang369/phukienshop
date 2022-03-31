<?php

namespace Modules\Common\Validators\Products;

use Vnnit\Core\Validators\BaseValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\Admin\Validators;
 */
class ProductsValidator extends BaseValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'product_code' => 'required',
            'product_name' => 'required',
            'product_image' => 'required',
            'product_content' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            // 'name' => 'required'
        ],
    ];
}
