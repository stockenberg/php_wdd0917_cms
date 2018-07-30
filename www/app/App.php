<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 30.07.18
 * Time: 09:51
 */

namespace sae\app;


use sae\app\configs\PageAction;
use sae\app\db\DB;
use sae\app\helpers\Route;
use sae\app\helpers\Session;

class App
{
    public function __construct()
    {
        Session::init('PHP_WDD_917_CMS');

        // Bug: Notice - undefined key in PAGE_METHODS action entry
        DB::set('', []);
        Route::get(
            $_GET['p'] ?? '',
            PageAction::PAGE_METHODS[$_GET['p'] ?? '']['class'],
            PageAction::PAGE_METHODS[$_GET['p'] ?? '']['actions'][$_GET['action'] ?? '']
        );



    }
}