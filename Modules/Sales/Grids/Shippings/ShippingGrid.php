<?php

namespace Modules\Sales\Grids\Shippings;

use Modules\Common\Entities\Administratives\DistrictModel;
use Modules\Common\Entities\Administratives\ProvinceModel;
use Modules\Common\Entities\Administratives\WardModel;
use Modules\Core\Grids\BaseGrid;

class ShippingGrid extends BaseGrid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Shipping';

    /**
    * Set the columns to be displayed.
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        return [
		    [
                'key' => 'province_id',
                'label' => __('admin::shipping.province'),
                'lookup' => [
                    'dataSource' => ProvinceModel::get(['name', 'id'])->toArray(),
                    'valueExpr' => 'id',
                    'displayExpr' => 'name'
                ]
            ],
		    [
                'key' => 'district_id',
                'label' => __('admin::shipping.district'),
                'lookup' => [
                    'dataSource' => DistrictModel::get(['name', 'id'])->toArray(),
                    'valueExpr' => 'id',
                    'displayExpr' => 'name'
                ]
            ],
		    [
                'key' => 'ward_id',
                'label' => __('admin::shipping.ward'),
                'lookup' => [
                    'dataSource' => WardModel::get(['name', 'id'])->toArray(),
                    'valueExpr' => 'id',
                    'displayExpr' => 'name'
                ]
            ],
		    [
                'key' => 'shipping_amount',
                'label' => __('admin::shipping.shipping_amount'),
                'cell' => function($item) {
                    return format_currency($item['shipping_amount']);
                }
            ]
		];
    }
}
