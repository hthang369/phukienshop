<?php

namespace App\Services;

use Nwidart\Menus\Facades\Menu;
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
}
