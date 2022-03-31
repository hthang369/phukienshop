<?php

namespace Modules\Posts\Repositories\Posts;

use Illuminate\Support\Facades\DB;
use Modules\Core\Repositories\BasePostsRepository;
use Modules\Posts\Entities\Posts\PostImagesModel;
use Modules\Posts\Entities\Posts\PostsModel;
use Modules\Posts\Forms\Posts\PostsForm;
use Modules\Posts\Grids\Posts\PostsGrid;
use Vnnit\Core\Support\FileManagementService;

class PostsRepository extends BasePostsRepository
{
    use PostsCriteria;

    protected $type = 'post';

    protected $presenterClass = PostsGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostsModel::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return PostsForm::class;
    }

    /**
     * Specify Service class name
     *
     * @return string
     */
    public function service()
    {
        return FileManagementService::class;
    }

    public function create(array $attributes)
    {
        $data_cat['category_id'] = $attributes['category_id'];
        $attributes['post_type'] = 'post';
        $attributes['post_date'] = now();
        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);
        $attributes['post_status'] = 1;
        $attributes['post_author'] = user_get('username');

        return DB::transaction(function () use($attributes, $data_cat) {
            $result = parent::create($attributes);

            $dataImageNew = $this->uploadFile($attributes, 'post_image');
            if ($dataImageNew) {
                $data['post_id'] = $result->id;
                $data['post_image'] = $dataImageNew;
                resolve(PostImagesRepository::class)->updateOrCreate($data, ['post_id' => $result->id]);
            }

            $data_cat['post_id'] = $result->id;
            resolve(PostCategoriesRepository::class)->updateOrCreate($data_cat, ['post_id' => $result->id]);

            return $result;
        });
    }

    public function update(array $attributes, $id)
    {
        $data = PostImagesModel::find($id, ['post_image']);
        $dataImageOld = $data['post_image'];

        $data_cat['category_id'] = $attributes['category_id'];
        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);

        return DB::transaction(function () use($attributes, $dataImageOld, $data_cat, $id) {
            $result = parent::update($attributes, $id);

            $dataImageNew = $this->uploadFile($attributes, 'post_image', $dataImageOld);
            if ($dataImageNew) {
                $dataImage['post_id'] = $result->id;
                $dataImage['post_image'] = $dataImageNew;
                resolve(PostImagesRepository::class)->updateOrCreate($dataImage, ['post_id' => $result->id]);
            }

            $data_cat['post_id'] = $result->id;
            resolve(PostCategoriesRepository::class)->updateOrCreate($data_cat, ['post_id' => $result->id]);

            return $result;
        });
    }

    public function getAllDataByCategory($id, $type = 'post')
    {
        $limit = 15;
        $query = $this->model::select(['posts.*', 'category_id', 'post_image'])
            ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
            ->leftJoin('post_images', 'post_images.post_id', '=', 'posts.id')
            ->where('post_type', $type)
            ->where('category_id', $id);

        return $query->paginate($limit);
    }

    public function getAllDataByCategoryParent($id, $limit = 0)
    {
        $query = $this->model::select(['posts.*', 'category_id', 'post_image', 'category_name', 'category_link', 'category_image'])
            ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
            ->join('categories', 'post_categories.category_id', '=', 'categories.id')
            ->leftJoin('post_images', 'post_images.post_id', '=', 'posts.id')
            ->where('categories.parent_id', $id);
        if ($limit > 0)
            $query->limit($limit);

        return $query->get();
    }

    public function getAllDataWithCategoryParent($id)
    {
        $mainQuery = clone $this->model;
        $subQuery = clone $this->model;
        $query = $this->model::select(['posts.*', 'category_id', 'post_image', 'category_name', 'category_link', 'category_image'])
            ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
            ->join('categories', 'post_categories.category_id', '=', 'categories.id')
            ->leftJoin('post_images', 'post_images.post_id', '=', 'posts.id')
            ->where('categories.parent_id', $id)
            ->orderBy('post_date', 'desc');

        return $mainQuery->select(['tmp1.*'])
            ->fromSub($subQuery->select([
                    DB::raw('ROW_NUMBER() over(PARTITION By category_id) stt'),
                    'tmp.*'
                ])
                ->fromSub($query, 'tmp'), 'tmp1')
            ->where('stt', '<=', 8)
            ->get();
    }
}
