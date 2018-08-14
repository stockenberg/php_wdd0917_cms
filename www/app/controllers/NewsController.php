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
use sae\app\helpers\StatusLog;
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

    public function view()
    {
        $news = new News();
        return $news->getNewsById($_GET['id']);
    }

    public function update()
    {
        print_r($_POST);
    }

    public function validate()
    {
      if(isset($_POST['news'])){
          if(empty($_POST['news']['headline'])){
                // consider to do this in constants in locale de.php
                StatusLog::write('headline', 'Headline is empty');
          }

          if(empty($_POST['news']['teaser'])){
              StatusLog::write('teaser', 'Teaser is empty');
          }

          if(empty($_POST['news']['content'])){
              StatusLog::write('content', 'Content is empty');
          }
          if(empty(StatusLog::allEntries())){
             $news = new News();
             if($news->createNews($_POST['news'])){
                 Session::addFlash('news_created', 'Die News wurde erfolgreich erstellt!');
                 App::redirect('all-news');
             }
          }

      }
    }

}