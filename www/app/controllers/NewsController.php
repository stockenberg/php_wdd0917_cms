<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 08.08.18
 * Time: 11:55
 */

namespace sae\app\controllers;


use sae\app\App;
use sae\app\helpers\Session;
use sae\app\models\News;

class NewsController
{
    public $data = [];

    public function init()
    {
        !Session::isAllowed([ADMIN, AUTHOR]) ? App::redirect('home') : null;

        /**
            $news = new News();
            $news->getAllNews();
        */

        $this->data['news'] = (new News())->getAllNews();
    }

}