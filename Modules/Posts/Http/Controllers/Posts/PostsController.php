<?php

namespace Modules\Posts\Http\Controllers\Posts;

use Modules\Posts\Repositories\Posts\PostsRepository;
use Modules\Posts\Validators\Posts\PostsValidator;
use Vnnit\Core\Http\Controllers\CoreController;
use Vnnit\Core\Responses\BaseResponse;

class PostsController extends CoreController
{
    public function __construct(PostsRepository $repository, PostsValidator $validator, BaseResponse $response)
    {
        parent::__construct($repository, $validator, $response);
        $this->setDefaultView('posts::posts');
        $this->setRouteName('posts');
        $this->setPathView([
            'create' => 'posts::posts.post_modal',
            'show' => 'posts::posts.post_modal',
            'update' => 'posts.update',
            'store' => 'posts.store',
            'destroy' => 'posts.destroy',
        ]);
    }

}
