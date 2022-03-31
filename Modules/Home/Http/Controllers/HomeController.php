<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Home\Repositories\HomeRepository;
use Modules\Home\Responses\HomeResponse;
use Modules\Home\Services\HomeServices;
use Modules\Home\Validators\HomeValidator;
use Modules\Setting\Facade\Setting;
use Vnnit\Core\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    protected $permissionActions = [
        'index' => 'public',
        'show' => 'public',
        'showPost' => 'public',
        'showPostDetail' => 'public',
        'sendMail' => 'public'
    ];

    public function __construct(HomeRepository $repository, HomeValidator $validator, HomeResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $slides = $this->repository->getAllSlide();
        $products = $this->repository->getPromotionProducts();
        return $this->response->data(request(), compact('slides', 'products'), 'home::index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $base = $this->repository->show($id);

        $viewName = $base['view_name'];
        if (blank($viewName)) $viewName = 'show';
        $this->data['mapInfo'] = data_get($this->allSetting, 'map.web_map');

        return view("home::$viewName", array_merge($this->data, $base['data']));
    }

    public function showPost($id)
    {
        $base = $this->repository->findPostCategory($id);

        $viewName = 'category';
        $this->data['mapInfo'] = data_get($this->allSetting, 'map.web_map');

        return view("home::$viewName", array_merge($this->data, $base));
    }

    public function showPostDetail($id)
    {
        $base = $this->repository->findPost($id);

        $viewName = 'show';
        $this->data['mapInfo'] = data_get($this->allSetting, 'map.web_map');

        return view("home::$viewName", array_merge($this->data, $base));
    }
}
