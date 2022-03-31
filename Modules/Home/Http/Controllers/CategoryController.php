<?php

namespace Modules\Home\Http\Controllers;

use Modules\Home\Repositories\CategoryRepository;
use Modules\Home\Validators\CategoryValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class CategoryController extends CoreController
{
    protected $permissionActions = [
        'index' => 'public',
        'show' => 'public'
    ];

    public function __construct(CategoryRepository $repository, CategoryValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $results = $this->repository->show($id);
        
        return $this->response->data(request(), $results['data'], 'home::categories.'.$results['view_name']);
    }
}
