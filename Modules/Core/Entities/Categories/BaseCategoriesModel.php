<?php

namespace Modules\Core\Entities\Categories;

use App\Facades\Common;
use Modules\Core\Traits\NestedSetCategoryTrait;
use Vnnit\Core\Entities\BaseModel;

abstract class BaseCategoriesModel extends BaseModel
{
    use NestedSetCategoryTrait;

    protected $table = 'categories';

    protected $category_type = '';

    protected $fillable = [
        'category_name',
        'category_excerpt',
        'category_link',
        'category_image',
        'parent_id',
        'category_lft',
        'category_rgt',
        'ob_title',
        'ob_desception',
        'ob_keyword',
        'category_status',
        'category_type'
    ];

    public function getDataByType($type)
    {
        $results = $this->where('category_type', $type)->defaultDepthNestedTree()->get(['id', 'category_name', 'depth']);
        $data = $results->mapToDictionary(function($item, $key) {
            return [data_get($item, 'id') => str_repeat('-- ', data_get($item, 'depth')).data_get($item, 'category_name')];
        })->map(function($item) {
            return head($item);
        });

        return $data->toArray();
    }

    // public function products()
    // {
    //     return $this->belongsToMany('Modules\Admin\Entities\ProductsModel', 'product_categories', 'category_id', 'product_id');
    // }

    // public function brands()
    // {
    //     return $this->belongsToMany('Modules\Admin\Entities\BrandsModel', 'brand_categories', 'category_id', 'brand_id');
    // }

    // public function getProductListAttribute()
    // {
    //     return Common::generatePortfolioProducts($this->products->take(8), $this->category_link);
    // }



    // public function getPostListAttribute()
    // {
    //     return resolve(PostsRepository::class)->getAllDataByCategory($this->id, 8);
    // }
}
