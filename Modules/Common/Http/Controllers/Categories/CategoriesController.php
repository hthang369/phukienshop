<?php

namespace Modules\Common\Http\Controllers\Categories;

use Illuminate\Http\Request;
use Modules\Common\Repositories\Categories\CategoriesRepository;
use Modules\Common\Validators\Categories\CategoriesValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class CategoriesController extends CoreController
{
    protected $permissionActions = [
        'viewIndex' => 'view'
    ];

    public function __construct(CategoriesRepository $repository, CategoriesValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('admin::categories');
        $this->setRouteName('categories');
        $this->setPathView([
            'create' => 'admin::categories.category_modal',
            'show' => 'admin::categories.category_modal',
            'update' => 'categories.update',
            'store' => 'categories.store',
            'destroy' => 'categories.destroy',
        ]);
    }

    public function viewIndex(Request $request, $type)
    {
        $request->merge(['category_type' => $type]);
        return parent::index();
    }

    public function viewProduct(Request $request)
    {
        return $this->viewIndex($request, 'product');
    }

    public function viewNews(Request $request)
    {
        return $this->viewIndex($request, 'news');
    }

    public function viewPost(Request $request)
    {
        return $this->viewIndex($request, 'post');
    }



    public function create($type = null)
    {
        request()->merge(['category_type' => $type]);
        return parent::create();
    }
}
