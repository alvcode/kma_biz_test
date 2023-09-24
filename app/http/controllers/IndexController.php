<?php

namespace app\http\controllers;

use app\repositories\ContentRepository;
use core\View;

class IndexController 
{

    private ContentRepository $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }


    public function __invoke()
    {
        $view = new View('index.php');

        $result = $this->contentRepository->allSortByMinute();

        $html = $view->render(['result' => $result]);
        echo $html;
    }
}