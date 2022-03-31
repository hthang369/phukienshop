<?php

namespace Modules\Sales\Forms\Shippings;

use Modules\Common\Entities\Administratives\ProvinceModel;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class ShippingForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('province_id', Field::SELECT, [
                'choices' => ProvinceModel::pluck('name', 'id')->toArray(),
                'selected' => data_get($this->getModel(), 'category_id'),
                'empty_value' => '=== Select Province ==='
            ])
            ->add('district_id', Field::SELECT, [
                'choices' => [],
                'selected' => data_get($this->getModel(), 'category_id'),
                'empty_value' => '=== Select District ==='
            ])
            ->add('ward_id', Field::SELECT, [
                'choices' => [],
                'selected' => data_get($this->getModel(), 'category_id'),
                'empty_value' => '=== Select Ward ==='
            ])
            ->add('shipping_amount', Field::NUMBER);
    }
}
