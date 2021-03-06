<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 30.07.18
 * Time: 09:51
 */

namespace sae\app;


use sae\app\routing\PageAction;
use sae\app\routing\Route;
use sae\app\helpers\Session;

class App
{
    public static $data = [];

    public function __construct()
    {
        Session::init('PHP_WDD_917_CMS');
        require_once ('app/locale/de.php');


        // Bug: Notice - undefined key in PAGE_METHODS action entry
        Route::get(
            $_GET['p'] ?? '',
            PageAction::PAGE_METHODS[$_GET['p'] ?? '']['class'],
            PageAction::PAGE_METHODS[$_GET['p'] ?? '']['actions'][$_GET['action'] ?? 'default']
        );

    }


    public static function redirect(String $target)
    {
        header('Location: ?p=' . $target);
        exit();
    }
}