<?php

namespace Modules\Sales\Validators\Shippings;

use Vnnit\Core\Validators\BaseValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\Admin\Validators;
 */
class ShippingValidator extends BaseValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'shipping_amount' => 'required|numeric',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required'
        ],
    ];
}
