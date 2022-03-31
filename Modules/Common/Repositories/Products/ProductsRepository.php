<?php

namespace Modules\Common\Repositories\Products;

use Illuminate\Support\Facades\DB;
use Modules\Common\Entities\Products\ProductsModel;
use Modules\Common\Forms\Products\ProductsForm;
use Modules\Common\Grids\Products\ProductsGrid;
use Modules\Core\Repositories\BaseCoreRepository;
use Vnnit\Core\Support\FileManagementService;

class ProductsRepository extends BaseCoreRepository
{
    protected $presenterClass = ProductsGrid::class;
    protected $imageColumnName = 'product_image';
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductsModel::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return ProductsForm::class;
    }

    /**
     * Specify Service class name
     *
     * @return string
     */
    public function service()
    {
        return FileManagementService::class;
    }

    public function getAllDataByCategoryParent($id, $limit = 0)
    {
        $query = $this->model::select(['products.*', 'category_id', 'product_images.product_image as image_children', 'category_name', 'category_link', 'category_image'])
            ->join('product_categories', 'product_categories.product_id', '=', 'products.id')
            ->join('categories', 'product_categories.category_id', '=', 'categories.id')
            ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
            ->where('categories.parent_id', $id);
        if ($limit > 0)
            $query->limit($limit);

        return $query->get();
    }

    public function getAllDataWithCategoryParent($id)
    {
        $mainQuery = clone $this->model;
        $subQuery = clone $this->model;
        $query = $this->model::select(['products.*', 'category_id', 'product_images.product_image as image_children', 'category_name', 'category_link', 'category_image'])
            ->join('product_categories', 'product_categories.product_id', '=', 'products.id')
            ->join('categories', 'product_categories.category_id', '=', 'categories.id')
            ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
            ->where('categories.parent_id', $id)
            ->orderBy('product_date', 'desc');

        return $mainQuery->select(['tmp1.*'])
            ->fromSub($subQuery->select([
                    DB::raw('ROW_NUMBER() over(PARTITION By category_id) stt'),
                    'tmp.*'
                ])
                ->fromSub($query, 'tmp'), 'tmp1')
            ->where('stt', '<=', 8)
            ->get();
    }

    public function create(array $attributes)
    {
        $data_cat['category_id'] = $attributes['category_id'];
        $attributes['product_date'] = now();
        if (blank($attributes['product_link']))
            $attributes['product_link'] = str_slug($attributes['product_name']);
        $attributes['product_status'] = 1;
        $attributes['product_author'] = user_get('username');

        return DB::transaction(function () use($attributes, $data_cat) {
            $list_category = data_get($attributes, 'list_category');
            $list_promotion = data_get($attributes, 'list_promotion');
            $result = parent::create($attributes);

            $dataImageNew = $this->uploadFiles($attributes, 'product_images');
            if ($dataImageNew) {
                foreach($dataImageNew as $file) {
                    $data['product_id'] = $result->id;
                    $data['product_image'] = $file;
                    resolve(ProductImagesRepository::class)->updateOrCreate($data, ['product_id' => $result->id]);
                }
            }

            $this->updateOrCreateForenignCategories(resolve(ProductCategoriesRepository::class), $list_category, $result->id);
            $this->updateOrCreateForenignPromotions(resolve(ProductPromotionsRepository::class), $list_promotion, $result->id);

            return $result;
        });
    }

    public function update(array $attributes, $id)
    {
        return DB::transaction(function () use($attributes, $id) {
            $list_category = data_get($attributes, 'list_category');
            $list_promotion = data_get($attributes, 'list_promotion');
            $result = parent::update($attributes, $id);

            $dataImageNew = $this->uploadFiles($attributes, 'product_images');
            if ($dataImageNew) {
                foreach($dataImageNew as $file) {
                    $data['product_id'] = $result->id;
                    $data['product_image'] = $file;
                    resolve(ProductImagesRepository::class)->updateOrCreate($data, ['product_id' => $result->id]);
                }
            }

            $this->updateOrCreateForenignCategories(resolve(ProductCategoriesRepository::class), $list_category, $id);
            $this->updateOrCreateForenignPromotions(resolve(ProductPromotionsRepository::class), $list_promotion, $id);

            return $result;
        });
    }

    public function getDataByPromotion()
    {
        return $this->model->with('promotions')->whereExists(function($query) {
            $query->select(DB::raw(1))
                ->from('promotions')
                ->join('product_promotions', 'promotion_id', '=', 'promotions.id')
                ->whereBetweenColumns(DB::raw('CURRENT_DATE'), [DB::raw('IFNULL(promotion_start_date, CURRENT_DATE)'), DB::raw('IFNULL(promotion_end_date, CURRENT_DATE)')]);
        })->get();
    }

    public function getAllDataByCategoryId($catId, $limit = 8)
    {

    }
}
