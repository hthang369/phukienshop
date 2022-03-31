<?php

namespace Modules\CSetting\Forms;

use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class WidgetTextForm extends Form
{
    public function buildForm()
    {
        $this->add('name', Field::TEXT)
            ->add('save_widget', Field::BUTTON_SUBMIT, [
                'label' => trans('csetting::configs.save_info'),
                'attr' => ['class' => 'btn btn-success']
            ]);
    }
}
