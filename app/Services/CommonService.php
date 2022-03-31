<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Modules\Admin\Enums\PromotionType;
use Vnnit\Core\Support\CommonHelper;

class CommonService extends CommonHelper
{
    public function chooseOptions($data, $dummyText = '', $dummyValue = '', $selectedValue = '')
    {
        $results = collect([
            [
                'id' => $dummyValue,
                'name' => $dummyText,
                'selected' => str_is($selectedValue, $dummyValue)
            ]
        ]);
        $data->each(function($item, $id) use(&$results, $selectedValue) {
            $results->push([
                'id' => $id,
                'name' => $item,
                'selected' => str_is($selectedValue, $id)
            ]);
        });

        return $results;
    }

    public function getOptionsByEnumType($enumClass)
    {
        $reflector = new \ReflectionClass($enumClass);
        return array_map(function($item) {
            return trans('common.promotion.'.strtolower($item));
        }, array_flip($reflector->getConstants()));
    }

    public function calculatorPromotionPrice($price, $promotion)
    {
        if (str_is($promotion->promotion_type, PromotionType::DECREASE_BY_PERCENT)) {
            return $price * ($promotion->promotion_number / 100);
        } else if (str_is($promotion->promotion_type, PromotionType::DECREASE_BY_AMOUNT)) {
            return $price - $promotion->promotion_number;
        } else
            return 0;
    }

    public function generatePortfolioProducts($results, $slug = '')
    {
        if (!($results instanceof Collection)) {
            $results = collect($results);
        }
        return $results->map(function($item) use($slug) {
            $promotion = $item->promotions->where('promotion_type', '!=', PromotionType::NONE_DECREASE)->first();
            if (empty($slug)) $slug = $item->default_category_link;
            return [
                'link' => route('page.show-product', [$slug, data_get($item, "product_link")]),
                'images' => [
                    'src' => vnn_asset($item->product_image),
                    'name' => $item->product_image,
                    'class' => 'card-img-top'
                ],
                'title' => $item->product_name,
                'price' => format_currency($item->product_price),
                'promotion_price' => format_currency($this->calculatorPromotionPrice($item->product_price, $promotion)),
                'promotion_percent' => str_is($promotion->promotion_type, PromotionType::DECREASE_BY_PERCENT) ? trans('common.promotion.decrease').' '.round($promotion->promotion_number).'%' : ''
            ];
        });
    }
}
