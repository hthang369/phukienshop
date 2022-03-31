<?php

namespace Modules\Admin\Repositories\Pages;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Forms\Pages\PagesForm;
use Modules\Admin\Grids\Pages\PagesGrid;
use Modules\Core\Repositories\BasePostsRepository;
use Modules\Posts\Entities\Posts\PostsModel;
use Vnnit\Core\Support\FileManagementService;

class PagesRepository extends BasePostsRepository
{
    use PagesCriteria;

    protected $type = 'page';

    protected $presenterClass = PagesGrid::class;
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
        return PagesForm::class;
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
        $attributes['post_type'] = 'page';
        $attributes['post_date'] = now();
        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);
        $attributes['post_status'] = 1;
        $attributes['author_id'] = user_get('id');

        return DB::transaction(function () use($attributes) {
            $result = parent::create($attributes);

            $dataImageNew = $this->uploadFile($attributes, 'post_image');
            if ($dataImageNew) {
                $data['post_id'] = $result->id;
                $data['post_image'] = $dataImageNew;
                resolve(PostImagesRepository::class)->updateOrCreate($data, ['post_id' => $result->id]);
            }

            return $result;
        });
    }

    public function update(array $attributes, $id)
    {
        $data = PostImagesModel::find($id, ['post_image']);
        $dataImageOld = $data['post_image'];

        if (blank($attributes['post_link']))
            $attributes['post_link'] = str_slug($attributes['post_title']);

        return DB::transaction(function () use($attributes, $dataImageOld, $id) {
            $result = parent::update($attributes, $id);

            $dataImageNew = $this->uploadFile($attributes, 'post_image', $dataImageOld);
            if ($dataImageNew) {
                $dataImage['post_id'] = $result->id;
                $dataImage['post_image'] = $dataImageNew;
                resolve(PostImagesRepository::class)->updateOrCreate($dataImage, ['post_id' => $result->id]);
            }

            return $result;
        });
    }
}
