<?php

namespace Modules\CSetting\Forms;

use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class SettingsMapForm extends Form
{
    public function buildForm()
    {
        if ($this->getData('action') == 'edit') {
            $this->add('web_map', Field::TEXTAREA, [
                'label' => trans('csetting::configs.web_map'),
            ]);
            $this->add('save_info', Field::BUTTON_SUBMIT, [
                'label' => trans('csetting::configs.save_info'),
                'attr' => ['class' => 'btn btn-success']
            ]);
            $this->add('cancel_info', Field::BUTTON_SUBMIT, [
                'label' => trans('csetting::configs.cancel_info'),
                'attr' => ['class' => 'btn btn-secondary', 'formaction' => route('setting.index'), 'formmethod' => 'get']
            ]);
        } else {
            $this->add('web_map', Field::MAP, [
                'tag' => 'div',
                'label' => trans('csetting::configs.web_map'),
            ]);
            $this->add('edit', Field::BUTTON_SUBMIT, [
                'label' => trans('admin::common.edit'),
                'attr' => ['class' => 'btn btn-primary']
            ]);
        }
    }
}
