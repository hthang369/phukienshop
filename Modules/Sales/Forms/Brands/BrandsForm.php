<?php

namespace Modules\Sales\Forms\Brands;

use Modules\Common\Entities\Categories\CategoriesModel;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class BrandsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('brand_name', Field::TEXT)
            ->add('brand_image', Field::FILE)
            ->add('list_category[]', Field::MULTI_SELECT, [
                'label' => 'Danh mục',
                'choices' => resolve(CategoriesModel::class)->getDataByType('product'),
                'selected' => data_get($this->getModel(), 'categories_id'),
                'id' => 'list_category'
            ]);
    }
}
