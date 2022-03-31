<?php

namespace Modules\Sales\Entities\Brands;

use Vnnit\Core\Entities\BaseModel;

class BrandsModel extends BaseModel
{
    protected $table = 'brands';

    protected $fillable = [
        'brand_name',
        'brand_image',
        'brand_status'
    ];

    public function categories()
    {
        return $this->belongsToMany('Modules\Admin\Entities\CategoriesModel', 'brand_categories', 'brand_id', 'category_id');
    }

    public function getCategoriesIdAttribute()
    {
        return $this->categories->pluck('id')->toArray();
    }

}
