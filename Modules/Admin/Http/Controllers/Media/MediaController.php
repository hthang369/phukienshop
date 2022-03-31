<?php

namespace Modules\Admin\Http\Controllers\Media;

use CKSource\CKFinderBridge\Controller\CKFinderController;
use Vnnit\Core\Plugins\FileManager\Lfm;

class MediaController extends CKFinderController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin::media.index')->withHelper(resolve(Lfm::class));
    }
}
