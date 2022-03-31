<?php

namespace Modules\Admin\Services\Crawlers;

interface CrawlerInterface
{
    public function crawlerHandle();
    public function saveData($data);
}
