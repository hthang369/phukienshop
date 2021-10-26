<?php
namespace App\Forms\Fields;

use Vnnit\Core\Forms\Fields\FormField;

class PageOrLinkType extends FormField
{
    protected function getTemplate()
    {
        return 'page_or_link';
    }

    protected function getAttributes()
    {
        return [
            'class' => 'form-control',
        ];
    }
}
