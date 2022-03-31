<?php

namespace Modules\Sales\Repositories\Promotions;

use Modules\Sales\Entities\Promotions\PromotionsModel;
use Modules\Sales\Forms\Promotions\PromotionsForm;
use Modules\Sales\Grids\Promotions\PromotionsGrid;
use Vnnit\Core\Repositories\CoreRepository;

class PromotionsRepository extends CoreRepository
{
    protected $presenterClass = PromotionsGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PromotionsModel::class;
    }

    public function form()
    {
        return PromotionsForm::class;
    }
}
