<?php

namespace Modules\Sales\Entities\Promotions;

use Modules\Core\Enums\ActionStatus;
use Vnnit\Core\Entities\BaseModel;

class PromotionsModel extends BaseModel
{
    protected $table = 'promotions';

    protected $fillable = [
        'promotion_code',
        'promotion_name',
        'promotion_type',
        'promotion_number',
        'promotion_start_date',
        'promotion_end_date',
        'promotion_status'
    ];

    public function getAllDataInProduct()
    {
        $results = $this->where('promotion_status', ActionStatus::ACTIVE)->get(['id', 'promotion_code', 'promotion_name']);
        return $results->mapToDictionary(function($item) {
            return [$item->id => $item->promotion_code.' - '.$item->promotion_name];
        })->map(function($item) {
            return head($item);
        })->toArray();
    }
}
