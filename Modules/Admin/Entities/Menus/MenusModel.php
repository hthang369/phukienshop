<?php

namespace Modules\Admin\Entities\Menus;

use Modules\Admin\Traits\NestedSetMenuTrait;
use Vnnit\Core\Entities\BaseModel;

class MenusModel extends BaseModel
{
    use NestedSetMenuTrait;

    protected $table = 'menus';

    protected $fillable = [
        'menu_name',
        'menu_link',
        'parent_id',
        'menu_lft',
        'menu_rgt',
        'menu_icon',
        'partial_id',
        'partial_table',
        'menu_type'
    ];

    public function scopeParseMenuColumns($query)
    {
        return $query->select([
            'id',
            'menu_name as title',
            'menu_link as link',
            'menu_icon as icon',
            'parent_id',
            'menu_lft',
            'menu_rgt',
        ]);
    }
}
