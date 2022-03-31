<?php

namespace Modules\CSetting\Http\Controllers;

use Modules\CSetting\Repositories\WidgetCriteria;
use Modules\CSetting\Repositories\WidgetRepository;
use Modules\CSetting\Responses\WidgetResponse;
use Modules\CSetting\Validators\WidgetValidator;
use Modules\CSetting\Forms\WidgetGroupForm;
use Modules\CSetting\Forms\WidgetTextForm;
use Vnnit\Core\Http\Controllers\CoreController;

class WidgetController extends CoreController
{
    protected $redirectRoute = [
        'error' => 'setting.index'
    ];

    public function __construct(WidgetRepository $repository, WidgetValidator $validator, WidgetResponse $response, WidgetCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('csetting::');
        $this->setRouteName('widget');
        $this->setPathView([
            'index' => 'csetting::widgets.widget',
            'edit'  => 'csetting::widget',
            'create' => 'csetting::widgets.create',
            'update' => 'widget.update',
            // 'show' => 'admin::configs.slide_modal'
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = $this->repository->getWidgetList();

        return $this->renderViewData(compact('data'), __FUNCTION__);
    }

    public function create($id = null)
    {
        $formBuiderName = WidgetTextForm::class;
        if ($id == 'group')
            $formBuiderName = WidgetGroupForm::class;

        $form = $this->formBuilder->create($formBuiderName, [
            'method' => 'POST',
            'route' => 'widget.store'
        ])->renderForm([]);
        // $data = $this->repository->getWidgetList();
        return $this->renderViewData(compact('form'), __FUNCTION__);
    }
}
