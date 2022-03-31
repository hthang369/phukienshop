<?php

namespace Modules\Admin\Forms\Advertises;

use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class AdvertisesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('advertise_name', Field::TEXT)
            ->add('advertise_link', Field::TEXT)
            ->add('advertise_image', Field::FILE);
    }
}
