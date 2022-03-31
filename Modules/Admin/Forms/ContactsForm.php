<?php

namespace Modules\Admin\Forms;

use Modules\Admin\Entities\CategoriesModel;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class ContactsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('subject', Field::STATIC)
            ->add('fullname', Field::STATIC)
            ->add('phone', Field::STATIC)
            ->add('content', Field::STATIC);
    }
}
