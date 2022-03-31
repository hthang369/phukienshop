<?php

namespace Modules\Common\Forms\Categories;

use Modules\Common\Entities\Categories\CategoriesModel;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class CategoriesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('category_name', Field::TEXT)
            ->add('category_excerpt', Field::TEXT)
            ->add('category_link', Field::TEXT)
            ->add('parent_id', Field::SELECT, [
                'choices' => CategoriesModel::whereNull('parent_id')->pluck('category_name', 'id')->toArray(),
                'selected' => data_get($this->getModel(), 'parent_id'),
                'empty_value' => '=== Select category ==='
            ]);
    }
}
