<?php

namespace Modules\Common\Grids\Products;

use Modules\Core\Grids\BaseGrid;

class ProductsGrid extends BaseGrid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Products';

    /**
    * Set the columns to be displayed.
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        return [
		    'product_code',
            'product_name',
		    'product_price',
		    'product_qty',
		    'product_image',
		    'product_status'
		];
    }

    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    public function configureButtons()
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
