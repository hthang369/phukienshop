<?php

namespace Modules\Sales\Forms\Promotions;

use App\Facades\Common;
use Modules\Admin\Enums\PromotionType;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class PromotionsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('promotion_code', Field::TEXT)
            ->add('promotion_name', Field::TEXT)
            ->add('promotion_type', Field::SELECT, [
                'label' => 'Loại khuyến mãi',
                'choices' => Common::getOptionsByEnumType(PromotionType::class),
                'selected' => data_get($this->getModel(), 'parent_id'),
                'empty_value' => '== Chọn loại khuyến mãi =='
            ])
            ->add('promotion_number', Field::NUMBER)
            ->add('promotion_start_date', Field::DATE)
            ->add('promotion_end_date', Field::DATE);
    }
}
