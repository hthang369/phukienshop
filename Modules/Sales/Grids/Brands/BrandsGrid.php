<?php

namespace Modules\Sales\Grids\Brands;

use Modules\Core\Grids\BaseGrid;
use Vnnit\Core\Facades\Common;

class BrandsGrid extends BaseGrid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Brands';

    /**
    * Set the columns to be displayed.
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        return [
            'brand_name',
            [
                'key' => 'brand_image',
                'cell' => function($itemData) {
                    return Common::getPictureImageFormPath($itemData['brand_image'], 150);
                }
            ],
            'brand_status'
		];
    }
}
