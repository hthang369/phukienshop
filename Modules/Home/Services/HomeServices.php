<?php

namespace Modules\Home\Services;

use App\Facades\Common;
use Illuminate\Support\Collection;
use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Enums\PromotionType;
use Nwidart\Menus\Facades\Menu;

class HomeServices
{
    public function getHeaderMenus()
    {
        return $this->getNavbarMenus('main', 'navbar_bt4');
    }

    public function getFooterMenus()
    {
        return $this->getNavbarMenus('footer');
    }

    public function getFooterOurMenus()
    {
        return $this->getNavbarMenus('footer_our');
    }

    private function getNavbarMenus($type, $menu_style = '')
    {
        $dataTree = MenusModel::where('menu_type', $type)->defaultOrder()->get()->toTree();
        Menu::create('navbar', function($menu) use($dataTree, $menu_style) {
            if (!blank($menu_style))
                $menu->style($menu_style);
            $this->renderMenu($menu, $dataTree);
        });
        return Menu::get('navbar');
    }

    private function renderMenu(&$menu, $dataTree, $class = 'nav-link')
    {
        $dataTree->each(function($item) use(&$menu, $class) {
            $childrens = data_get($item, 'children');
            if ($childrens && $childrens->count() > 0) {
                $menu->dropdown(data_get($item, 'menu_name'), function($subMenu) use($childrens) {
                    $this->renderMenu($subMenu, $childrens, 'dropdown-item');
                });
            } else {
                $icon = data_get($item, 'menu_icon');
                $menu->url(data_get($item, 'menu_link'), data_get($item, 'menu_name'),
                    ['class' => $class, 'icon' => $icon]
                );
            }
        });
    }

    public function generatePortfolio($results, $type = 'post')
    {
        if (!($results instanceof Collection)) {
            $results = collect($results);
        }
        return $results->map(function($item) use($type) {
            return [
                'link' => route('page.show-detail', data_get($item, "{$type}_link")),
                'images' => [
                    'src' => asset("storage/images/".$item->{$type.'_image'}),
                    'name' => $item->{$type.'_image'},
                    'class' => 'card-img-top'
                ],
                'title' => $item->{$type.'_title'},
                'excerpt' => $item->{$type.'_excerpt'}
            ];
        });
    }

}
