<?php

namespace Modules\Common\Entities\Products;

use App\Facades\Common;
use Modules\Common\Repositories\Products\ProductCategoriesRepository;
use Modules\Core\Enums\PromotionType;
use Vnnit\Core\Entities\BaseModel;

class ProductsModel extends BaseModel
{
    protected $table = 'products';

    protected $fillable = [
        'product_code',
        'product_name',
        'product_link',
        'uom_id',
        'product_price',
        'product_qty',
        'product_date',
        'product_image',
        'product_author',
        'product_warranty',
        'product_excerpt',
        'product_content',
        'ob_title',
        'ob_desception',
        'ob_keyword',
        'product_status'
    ];

    public function getCategoriesIdAttribute()
    {
        return resolve(ProductCategoriesRepository::class)->findByField('product_id', $this->id, ['category_id'])->pluck('category_id');
    }

    public function getPromotionsIdAttribute()
    {
        return resolve(ProductPromotionsRepository::class)->findByField('product_id', $this->id, ['promotion_id'])->pluck('promotion_id');
    }

    public function getDefaultCategoryLinkAttribute()
    {
        $data = resolve(ProductCategoriesRepository::class)->getDefaultCategory(['category_link']);
        return data_get($data, 'category_link');
    }

    public function promotions()
    {
        return $this->belongsToMany('Modules\Admin\Entities\PromotionsModel', 'product_promotions', 'product_id', 'promotion_id');
    }

    public function images()
    {
        return $this->hasMany('Modules\Admin\Entities\ProductImagesModel', 'product_id');
    }

    public function pro_images()
    {
        return array_merge([$this->product_image], $this->images->pluck('product_image')->toArray());
    }

    public function getProductTitleAttribute()
    {
        return $this->product_name.' '.$this->product_code;
    }

    public function getPromotionPriceAttribute()
    {
        $promotion = $this->promotions->where('promotion_type', '!=', PromotionType::NONE_DECREASE)->first();
        return Common::calculatorPromotionPrice($this->product_price, $promotion);
    }
}
