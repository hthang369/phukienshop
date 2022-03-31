<?php

namespace Modules\Sales\Repositories\Brands;

use Illuminate\Support\Facades\DB;
use Modules\Core\Repositories\BaseCoreRepository;
use Modules\Sales\Entities\Brands\BrandsModel;
use Modules\Sales\Forms\Brands\BrandsForm;
use Modules\Sales\Grids\Brands\BrandsGrid;
use Vnnit\Core\Support\FileManagementService;

class BrandsRepository extends BaseCoreRepository
{
    protected $presenterClass = BrandsGrid::class;
    protected $imageColumnName = 'brand_image';
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BrandsModel::class;
    }

    public function form()
    {
        return BrandsForm::class;
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

    public function create(array $attributes)
    {
        return DB::transaction(function () use($attributes) {
            $list_category = data_get($attributes, 'list_category');
            $result = parent::create($attributes);

            $brandCatRepository = resolve(BrandCategoriesRepository::class);
            $this->updateOrCreateForenignCategories($brandCatRepository, $list_category, $result->id);
        });
    }

    public function update(array $attributes, $id)
    {
        return DB::transaction(function () use($attributes, $id) {
            $list_category = data_get($attributes, 'list_category');
            $result = parent::update($attributes, $id);

            $brandCatRepository = resolve(BrandCategoriesRepository::class);
            $this->updateOrCreateForenignCategories($brandCatRepository, $list_category, $result->id);
        });
    }
}
