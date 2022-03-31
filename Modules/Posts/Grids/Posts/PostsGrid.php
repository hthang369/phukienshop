<?php

namespace Modules\Posts\Grids\Posts;

use Modules\Core\Facades\StatusType;
use Modules\Core\Grids\BaseGrid;
use Modules\Posts\Entities\Categories\CategoriesModel;
use Vnnit\Core\Facades\Common;

class PostsGrid extends BaseGrid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Posts';

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
                'key' => 'post_title',
                'label' => trans('admin::posts.post_title')
            ],
            [
                'key' => 'post_image',
                'label' => trans('admin::posts.post_image'),
                'cell' => function($itemData) {
                    return Common::getPictureImageFormPath($itemData['post_image'], 150);
                }
            ],
            [
                'key' => 'category_id',
                'label' => trans('admin::posts.category_id'),
                'lookup' => [
                    'dataSource' => CategoriesModel::get(['category_name', 'id'])->toArray(),
                    'valueExpr' => 'id',
                    'displayExpr' => 'category_name'
                ],
            ],
            [
                'key' => 'post_excerpt',
                'label' => trans('admin::posts.post_excerpt'),
            ],
            [
                'key' => 'post_date',
                'label' => trans('admin::posts.post_date'),
            ],
            [
                'key' => 'post_status',
                'label' => trans('admin::posts.post_status'),
                'cell' => function($itemData) {
                    return StatusType::getStatusType($itemData['post_status']);
                }
            ],
        ];
    }

    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    protected function configureButtons()
    {
        parent::configureButtons();
		$this->editToolbarButton('create', [
            'dataAttributes' => [
                'modal-size' => 'modal-xl',
                'loading' => translate('table.loading_text')
            ],
        ]);
        $this->editRowButton('edit', [
            'dataAttributes' => [
                'modal-size' => 'modal-xl',
                'loading' => translate('table.loading_text')
            ],
        ]);
    }
}
