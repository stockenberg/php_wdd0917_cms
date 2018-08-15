<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 08.08.18
 * Time: 11:55
 */

namespace sae\app\controllers;


use Delight\FileUpload\FileUpload;
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
         * $news = new News();
         * $news->getAllNews();
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
        if (isset($_POST['news'])) {
            if (empty($_POST['news']['headline'])) {
                // consider to do this in constants in locale de.php
                StatusLog::write('headline', 'Headline is empty');
            }

            if (empty($_POST['news']['teaser'])) {
                StatusLog::write('teaser', 'Teaser is empty');
            }

            if (empty($_POST['news']['content'])) {
                StatusLog::write('content', 'Content is empty');
            }


            try {
                $filename = $this->uploadFile();
            } catch (\RuntimeException $e) {
                echo $e->getMessage();
            }

            if (empty(StatusLog::allEntries())) {
                $news = new News();
                if ($news->createNews($_POST['news'], $filename)) {
                    Session::addFlash('news_created', 'Die News wurde erfolgreich erstellt!');
                    App::redirect('all-news');
                }
            }

        }
    }

    public function uploadFileComposer() {
        /**
        $upload = new FileUpload();
        $upload->withTargetDirectory(UPLOAD_PATH);
        $upload->from('img');

        try {
        $uploadedFile = $upload->save();

        // success: $uploadedFile->getFilenameWithExtension()
        }
        catch (\Delight\FileUpload\Throwable\InputNotFoundException $e) {
        // input not found
        }
        catch (\Delight\FileUpload\Throwable\InvalidFilenameException $e) {
        // invalid filename
        }
        catch (\Delight\FileUpload\Throwable\InvalidExtensionException $e) {
        // invalid extension
        }
        catch (\Delight\FileUpload\Throwable\FileTooLargeException $e) {
        // file too large
        }
        catch (\Delight\FileUpload\Throwable\UploadCancelledException $e) {
        // upload cancelled
        }
         */
    }

    public function uploadFile()
    {
        if (!empty($_FILES)) {
            /** Error code checking */
            switch ($_FILES['news']['error']['img']) {
                case UPLOAD_ERR_OK:
                    break;

                case UPLOAD_ERR_NO_FILE:
                    throw new \RuntimeException("du hast keine datei hochgeladen - honk!");
                    break;

                case UPLOAD_ERR_NO_TMP_DIR:
                    throw new \RuntimeException("es gibt kein tmp dir");
                    break;

                case UPLOAD_ERR_FORM_SIZE:
                case UPLOAD_ERR_INI_SIZE:
                    throw new \RuntimeException("Dateigröße überschreitet das limit");
                    break;

                case UPLOAD_ERR_CANT_WRITE:
                    throw new \RuntimeException("Verzeichnis ist nicht beschreibbar");
                break;
            }

            $mime = [
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ];

            if(!in_array($_FILES['news']['type']['img'], $mime)){
                throw new \RuntimeException('Datei wird nicht zugelassen!');
            }

            if($_FILES['news']['size']['img'] > 4000000){
                throw new \RuntimeException('Datei ist zu groß');
            }

            if(move_uploaded_file(
                $_FILES['news']['tmp_name']['img'],
                UPLOAD_PATH . $_FILES['news']['name']['img']
            )){
                return $_FILES['news']['name']['img'];
            }
        }
    }

}