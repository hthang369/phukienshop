<?php

namespace Modules\Sales\Repositories\Shippings;

use Modules\Sales\Entities\Shippings\ShippingModel;
use Modules\Sales\Forms\Shippings\ShippingForm;
use Modules\Sales\Grids\Shippings\ShippingGrid;
use Vnnit\Core\Repositories\CoreRepository;

class ShippingRepository extends CoreRepository
{
    protected $presenterClass = ShippingGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ShippingModel::class;
    }

    public function form()
    {
        return ShippingForm::class;
    }
}
