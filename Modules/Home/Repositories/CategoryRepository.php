<?php

namespace Modules\Home\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\CategoriesModel;
use Modules\Admin\Entities\MenusModel;
use Modules\Admin\Entities\PagesModel;
use Vnnit\Core\Repositories\CoreRepository;

class CategoryRepository extends CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoriesModel::class;
    }

    public function show($id, $columns = [])
    {
        $menu = MenusModel::where('menu_link', $id)->first();
        $results = $menu;
        $viewName = data_get($menu, 'menu_view');
        switch(data_get($menu, 'partial_table')) {
            case 'page':
                $data = PagesModel::find(data_get($menu, 'partial_id'));
                $results = $data;
                $viewName = 'show';
                break;
            case 'category':
                $results = $this->getChildrenDataByLink($id);
                $viewName = $results->children->count() > 0 ? 'index' : 'children';
                break;
            case 'news':
                $data = CategoriesModel::find(data_get($menu, 'partial_id'));
                data_set($data, 'post_list', resolve(PostsRepository::class)->getAllDataByCategory($data->id, 'news'));
                $results = $data;
                $viewName = 'news';
                break;
        }
        return [
            'view_name' => $viewName,
            'data' => $results
        ];
    }

    public function getChildrenDataByLink($slug)
    {
        $main = $this->model->where('category_link', $slug);
        return $main->union(
            $this->model->whereExists(function($query) use($slug) {
                $query->select(DB::raw(1))
                    ->from('categories as parent')
                    ->where('parent.category_link', $slug)
                    ->whereColumn('categories.category_lft', '>', 'parent.category_lft')
                    ->whereColumn('categories.category_rgt', '<', 'parent.category_rgt');
            }))->defaultOrder()->get()->toTree()->first();
    }
}
