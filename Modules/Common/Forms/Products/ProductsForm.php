<?php

namespace Modules\Common\Forms\Products;

use Modules\Common\Entities\Categories\CategoriesModel;
use Modules\Sales\Entities\Promotions\PromotionsModel;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class ProductsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('product_code', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('product_name', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('product_price', Field::NUMBER)
            ->add('product_qty', Field::NUMBER)
            ->add('list_category[]', Field::MULTI_SELECT, [
                'label' => 'Danh mục',
                'choices' => resolve(CategoriesModel::class)->getDataByType('product'),
                'selected' => data_get($this->getModel(), 'categories_id')->toArray(),
                'id' => 'list_category'
            ])
            ->add('list_promotion[]', Field::MULTI_SELECT, [
                'label' => 'Khuyến mãi',
                'choices' => resolve(PromotionsModel::class)->getAllDataInProduct(),
                'selected' => data_get($this->getModel(), 'promotions_id')->toArray(),
                'id' => 'list_promotion'
            ])
            ->add('product_excerpt', Field::TEXT)
            ->add('product_link', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('product_image', Field::FILE)
            ->add('product_images[]', Field::MULTI_FILE)
            ->add('product_content', Field::TEXTAREA)
            ->add('ob_title', Field::TEXT)
            ->add('ob_desception', Field::TEXT)
            ->add('ob_keyword', Field::TEXT);
    }
}
