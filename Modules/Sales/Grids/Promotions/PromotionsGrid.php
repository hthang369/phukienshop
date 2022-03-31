<?php

namespace Modules\Sales\Grids\Promotions;

use Modules\Core\Grids\BaseGrid;

class PromotionsGrid extends BaseGrid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Promotions';

    /**
    * Set the columns to be displayed.
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        return [
            'promotion_code',
            'promotion_name',
            'promotion_type',
            'promotion_number',
            'promotion_status'
		];
    }
}
