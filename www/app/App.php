<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 30.07.18
 * Time: 09:51
 */

namespace sae\app;


use sae\app\configs\PageAction;
use sae\app\helpers\Route;
use sae\app\helpers\Session;
use sae\app\models\Login;

class App
{
    public function __construct()
    {
        Session::init('PHP_WDD_917_CMS');
        require_once ('app/locale/de.php');

        $model = new Login();
        $model->getUserByUsernameWithRole('admin');

        // Bug: Notice - undefined key in PAGE_METHODS action entry
        Route::get(
            $_GET['p'] ?? '',
            PageAction::PAGE_METHODS[$_GET['p'] ?? '']['class'],
            PageAction::PAGE_METHODS[$_GET['p'] ?? '']['actions'][$_GET['action'] ?? '']
        );

    }


    public static function redirect(String $target)
    {
        header('Location: ?p=' . $target);
        exit();
    }
}